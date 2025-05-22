<header>
    <div class="flex items-center justify-between p-4 bg-white shadow">
        <div class="flex items-center">
            <a href="<?= $this->urlFor('home') ?>" class="text-xl font-bold text-gray-800">MyApp</a>
        </div>
        <div class="flex items-center space-x-4">
            <!-- Notification Button -->
            <button id="notificationButton"
                class="p-2 text-gray-600 transition duration-200 rounded-lg hover:bg-gray-100">
                <i class="fas fa-bell"></i>
                <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-600 rounded-full"></span>
            </button>

            <!-- Improved Dropdown -->
            <div id="notificationDropdown"
                class="absolute right-0 z-50 hidden mt-2 overflow-hidden transition-all ease-in-out origin-top-right transform scale-95 bg-white border border-gray-100 rounded-lg shadow-lg opacity-0 w-80">
                <!-- Dropdown Header -->
                <div class="p-4 font-semibold text-gray-700 bg-gray-100 border-b">Notifications</div>

                <!-- Notification List -->
                <ul class="flex-1 p-2 space-y-2 bg-white">
                    <!-- Notification Item 1 - Unread -->
                    <li
                        class="flex items-center p-3 transition duration-200 rounded-lg shadow cursor-pointer hover:bg-gray-50">
                        <!-- Unread Indicator -->
                        <span class="w-2 h-2 mr-3 bg-blue-200 rounded-full"></span>
                        <i class="mr-3 text-blue-500 fas fa-envelope"></i>
                        <div>
                            <p class="text-sm font-medium text-gray-800">New user registered!</p>
                            <p class="mt-1 text-xs text-gray-500">5 minutes ago</p>
                        </div>
                    </li>
                    <!-- Notification Item 2 - Unread -->
                    <li
                        class="flex items-center p-3 transition duration-200 rounded-lg shadow cursor-pointer hover:bg-gray-50">
                        <!-- Unread Indicator -->
                        <span class="w-2 h-2 mr-3 bg-blue-200 rounded-full"></span>
                        <i class="mr-3 text-red-500 fas fa-exclamation-circle"></i>
                        <div>
                            <p class="text-sm font-medium text-gray-800">System alert: High CPU usage.</p>
                            <p class="mt-1 text-xs text-gray-500">1 hour ago</p>
                        </div>
                    </li>
                    <!-- Notification Item 3 - Read -->
                    <li
                        class="flex items-center p-3 transition duration-200 bg-gray-100 rounded-lg shadow cursor-pointer hover:bg-gray-50">
                        <i class="mr-3 text-green-500 fas fa-tasks"></i>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Request #105 has been approved.</p>
                            <p class="mt-1 text-xs text-gray-500">30 minutes ago</p>
                        </div>

                    </li>

                </ul>
                <!-- Dropdown Footer -->
                <div class="p-2 text-center border-t">
                    <a href="#" class="text-sm text-blue-500 hover:underline">Mark all as read</a>
                </div>
            </div>
            <!-- User Profile Dropdown -->
            <div class="relative">
                <button id="userProfileButton"
                    class="flex items-center p-2 text-gray-600 transition duration-200 rounded-lg hover:bg-gray-100">
                    <img src="<?= $user->getProfilePicture() ?>" alt="User Profile" class="w-8 h-8 rounded-full">
                </button>

                <!-- User Profile Dropdown -->
                <div id="userProfileDropdown"
                    class="absolute right-0 z-50 hidden w-48 mt-2 overflow-hidden transition-all ease-in-out origin-top-right transform scale-95 bg-white border border-gray-100 rounded-lg shadow-lg opacity-0">
                    <div class="p-4 font-semibold text-gray-700 bg-gray-100 border-b">User Profile</div>
                    <ul class="p-2 space-y-2 bg-white">
                        <li>
                            <a href="<?= $this->urlFor('user.profile') ?>"
                                class="flex items-center p-3 transition duration-200 rounded-lg hover:bg-gray-50">
                                <i class="mr-3 fas fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->urlFor('user.settings') ?>"
                                class="flex items-center p-3 transition duration-200 rounded-lg hover:bg-gray-50">
                                <i class="mr-3 fas fa-cog"></i>
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="<?= $this->urlFor('logout') ?>"
                                class="flex items-center p-3 transition duration-200 rounded-lg hover:bg-gray-50">
                                <i class="mr-3 fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to toggle dropdown visibility
        document.getElementById('notificationButton').addEventListener('click', function() {
            const dropdown = document.getElementById('notificationDropdown');
            dropdown.classList.toggle('hidden');
            dropdown.classList.toggle('opacity-0');
            dropdown.classList.toggle('scale-95');
        });

        document.getElementById('userProfileButton').addEventListener('click', function() {
            const dropdown = document.getElementById('userProfileDropdown');
            dropdown.classList.toggle('hidden');
            dropdown.classList.toggle('opacity-0');
            dropdown.classList.toggle('scale-95');
        });
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const notificationDropdown = document.getElementById('notificationDropdown');
            const userProfileDropdown = document.getElementById('userProfileDropdown');

            if (!event.target.closest('#notificationButton') && !event.target.closest('#notificationDropdown')) {
                notificationDropdown.classList.add('hidden');
                notificationDropdown.classList.remove('opacity-0', 'scale-95');
            }

            if (!event.target.closest('#userProfileButton') && !event.target.closest('#userProfileDropdown')) {
                userProfileDropdown.classList.add('hidden');
                userProfileDropdown.classList.remove('opacity-0', 'scale-95');
            }
        });
    </script>
</header>