<script>
    document.addEventListener('DOMContentLoaded', function(){
        // Mobile Menu
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        if(mobileMenuButton && mobileMenu){
            mobileMenuButton.addEventListener('click', function(){
                mobileMenu.classList.toggle('hidden');
            });
        }
    })
</script>