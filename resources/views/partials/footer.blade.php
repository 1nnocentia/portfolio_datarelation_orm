<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- About Section -->
            <div class="col-span-2">
                <h3 class="text-2xl font-bold text-gradient mb-4">Han Inno</h3>
                <p class="text-gray-300 mb-4">
                    A passionate engineer creating amazing automate experiences with modern technologies.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="social-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/innocentia-handani/" class="social-link">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://github.com/1nnocentia" class="social-link">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://instagram.com/innocentia_h" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="footer-link">Home</a></li>
                    <li><a href="{{ route('about') }}" class="footer-link">About</a></li>
                    <li><a href="{{ route('portfolio') }}" class="footer-link">Portfolio</a></li>
                    <li><a href="{{ route('resume') }}" class="footer-link">Resume</a></li>
                    <li><a href="{{ route('blog') }}" class="footer-link">Blog</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                <ul class="space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-2"></i>
                        <span class="text-gray-300">letsworkwithinno@gmail.com</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-2"></i>
                        <span class="text-gray-300">+62 851 2345 6789</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span class="text-gray-300">Indonesia</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-400">
                &copy; {{ date('Y') }} Portfolio. All rights reserved.
            </p>
        </div>
    </div>
</footer>