<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <span class="text-2xl font-bold text-white">Eat&Drink</span>
                <p class="text-gray-400 mt-2">L'événement culinaire incontournable de la région</p>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold mb-4">Liens rapides</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('exposants.index') }}" class="text-gray-400 hover:text-primary transition-colors">Nos Exposants</a></li>
                    <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-primary transition-colors">Se connecter</a></li>
                    <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-primary transition-colors">S'inscrire</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact</h4>
                <address class="text-gray-400 not-italic">
                    <p><i class="fas fa-map-marker-alt mr-2"></i> 3 Rue de la Marina, Cotonou</p>
                    <p class="mt-2"><i class="fas fa-envelope mr-2"></i> contact@eatdrink.com</p>
                    <p class="mt-2"><i class="fas fa-phone mr-2"></i>+229 01 67 88 65 33</p>
                </address>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                <form class="flex">
                    <input type="email" placeholder="Votre email" class="px-4 py-2 rounded-l text-gray-900 w-full">
                    <button type="submit" class="bg-primary px-4 py-2 rounded-r">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
                <div class="flex space-x-4 mt-4 text-xl">
                    <a href="#" class="hover:text-primary"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-primary"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="hover:text-primary"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-primary"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2023 Eat & Drink Expo. Tous droits réservés.</p>
        </div>
    </div>
</footer>