document.addEventListener('DOMContentLoaded', () => {

    const categoryCards = document.querySelectorAll('.category-card');
    const blogPostCards = document.querySelectorAll('.blog-post-card'); // Asumsi kartu blog Anda pakai class ini
    const blogLoadMoreBtn = document.getElementById('blog-load-more-btn'); // Asumsi Anda punya tombol load more
    const postsToShowInitially = 6;

    if (categoryCards.length > 0 && blogPostCards.length > 0) {
        
        categoryCards.forEach(card => {
            card.addEventListener('click', function(e) {
                e.preventDefault();
                const filter = this.getAttribute('data-filter');
                
                categoryCards.forEach(c => c.classList.remove('active')); 
                this.classList.add('active');
                
                let visibleCount = 0; 
                
                blogPostCards.forEach(post => {
                    const category = post.getAttribute('data-category');
                    const isMatch = (filter === 'all' || category === filter);
                    
                    post.classList.remove('load-more-post');

                    if (isMatch) {
                        if (visibleCount < postsToShowInitially) {
                            post.style.display = 'block';
                            post.classList.remove('scale-0', 'opacity-0');
                            post.classList.add('scale-100', 'opacity-100');
                            visibleCount++;
                        } else {
                            post.classList.add('load-more-post'); 
                            post.classList.remove('scale-100', 'opacity-100');
                            post.classList.add('scale-0', 'opacity-0');
                            setTimeout(() => { post.style.display = 'none'; }, 300); 
                        }
                    } else {
                        post.classList.remove('scale-100', 'opacity-100');
                        post.classList.add('scale-0', 'opacity-0');
                        setTimeout(() => { post.style.display = 'none'; }, 300); 
                    }
                });
                
                const hiddenMatchingPosts = document.querySelectorAll('.blog-post-card.load-more-post');
                if (hiddenMatchingPosts.length > 0 && blogLoadMoreBtn) {
                    blogLoadMoreBtn.style.display = 'inline-block';
                } else if (blogLoadMoreBtn) {
                    blogLoadMoreBtn.style.display = 'none';
                }
            });
        });

        if (blogLoadMoreBtn) {
            blogLoadMoreBtn.addEventListener('click', () => {
                const hiddenPosts = document.querySelectorAll('.blog-post-card.load-more-post');
                let shownCount = 0;

                hiddenPosts.forEach(post => {
                    if (shownCount < postsToShowInitially) { 
                        post.style.display = 'block';
                        post.classList.remove('scale-0', 'opacity-0', 'load-more-post');
                        post.classList.add('scale-100', 'opacity-100');
                        shownCount++;
                    }
                });

                if (document.querySelectorAll('.blog-post-card.load-more-post').length === 0) {
                    blogLoadMoreBtn.style.display = 'none';
                }
            });
        }
    }

    // Newsletter
    const newsletterForm = document.querySelector('#newsletter-form'); 
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const emailInput = this.querySelector('input[type="email"]');
            const email = emailInput.value;
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;

            if (!email || !validateEmail(email)) {
                alert('Please enter a valid email address.');
                emailInput.focus();
                return;
            }
            
            submitBtn.textContent = 'Subscribing...';
            submitBtn.disabled = true;

            try {
                const response = await fetch('/subscribe-newsletter', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ email: email })
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.message || 'Subscription failed.');
                }

                const data = await response.json();

                this.reset();
                submitBtn.textContent = 'Subscribed!';
                submitBtn.classList.add('bg-green-600');

            } catch (error) {
                console.error('Subscription Error:', error);
                submitBtn.textContent = 'Failed! Try again.';
                submitBtn.classList.add('bg-red-600');
            
            } finally {
                setTimeout(() => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('bg-green-600', 'bg-red-600');
                }, 3000);
            }
        });
    }

    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

});