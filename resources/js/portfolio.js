document.addEventListener('DOMContentLoaded', () => {
    // Filter Projects
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');
    const loadMoreBtn = document.getElementById('load-more-btn'); 
    const projectsToShowInitially = 3; 

    if (filterButtons.length > 0 && projectCards.length > 0) {
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-gradient-primary', 'text-white');
                    btn.classList.add('bg-white', 'text-gray-700', 'border-gray-200', 'hover:bg-gradient-primary', 'hover:text-white', 'hover:border-transparent');
                });
                
                this.classList.remove('bg-white', 'text-gray-700', 'border-gray-200', 'hover:bg-gradient-primary', 'hover:text-white', 'hover:border-transparent');
                this.classList.add('active', 'bg-gradient-primary', 'text-white');
                
                let visibleCount = 0; 
                
                projectCards.forEach(card => {
                    const category = card.getAttribute('data-category');
                    const isMatch = (filter === 'all' || category === filter);
                    
                    card.classList.remove('load-more-project');

                    if (isMatch) {
                        if (visibleCount < projectsToShowInitially) {
                            card.style.display = 'block';
                            card.classList.remove('scale-0', 'opacity-0');
                            card.classList.add('scale-100', 'opacity-100');
                            visibleCount++;
                        } else {
                            card.classList.add('load-more-project'); 
                            card.classList.remove('scale-100', 'opacity-100');
                            card.classList.add('scale-0', 'opacity-0');
                            setTimeout(() => {
                                card.style.display = 'none';
                            }, 300); 
                        }
                    } else {
                        card.classList.remove('scale-100', 'opacity-100');
                        card.classList.add('scale-0', 'opacity-0');
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300); 
                    }
                });
                
                const hiddenMatchingCards = document.querySelectorAll('.project-card.load-more-project');
                
                if (hiddenMatchingCards.length > 0 && loadMoreBtn) {
                    loadMoreBtn.style.display = 'inline-block';
                } else if (loadMoreBtn) {
                    loadMoreBtn.style.display = 'none';
                }
            });
        });

        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', () => {
                const hiddenCards = document.querySelectorAll('.project-card.load-more-project');
                let shownCount = 0;

                hiddenCards.forEach(card => {
                    if (shownCount < projectsToShowInitially) { 
                        card.style.display = 'block';
                        card.classList.remove('scale-0', 'opacity-0', 'load-more-project');
                        card.classList.add('scale-100', 'opacity-100');
                        shownCount++;
                    }
                });

                if (document.querySelectorAll('.project-card.load-more-project').length === 0) {
                    loadMoreBtn.style.display = 'none';
                }
            });
        }
    }

});