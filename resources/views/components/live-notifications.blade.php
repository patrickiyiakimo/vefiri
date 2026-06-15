<!-- resources/views/components/live-notifications.blade.php -->
<div id="liveNotificationContainer" class="fixed bottom-6 left-4 sm:left-6 z-50 space-y-2">
    <!-- Notifications will appear here dynamically -->
</div>

<script>
    // Professional live notifications data - 100 unique notifications (Nigerian cities only)
    const notifications = [
        // Order placed notifications - 60 items
        { type: 'order', name: 'Michael Okonkwo', location: 'Lagos, Nigeria', item: 'Premium Leather Backpack' },
        { type: 'order', name: 'Chioma Eze', location: 'Lagos, Nigeria', item: 'Kitchen Blender' },
        { type: 'order', name: 'Olumide Adeyemi', location: 'Lagos, Nigeria', item: 'Gaming Mouse' },
        { type: 'order', name: 'Femi Ogunlesi', location: 'Lagos, Nigeria', item: 'Smart Watch' },
        { type: 'order', name: 'Victor Okafor', location: 'Lagos, Nigeria', item: 'Android Phone' },
        { type: 'order', name: 'Ngozi Obi', location: 'Lagos, Nigeria', item: 'Makeup Kit' },
        { type: 'order', name: 'Blessing Akpan', location: 'Lagos, Nigeria', item: 'Microwave Oven' },
        { type: 'order', name: 'Gloria Nwosu', location: 'Lagos, Nigeria', item: 'Cooking Pot' },
        { type: 'order', name: 'Tunde Bakare', location: 'Lagos, Nigeria', item: 'Wireless Speaker' },
        { type: 'order', name: 'Kehinde Ogunleye', location: 'Lagos, Nigeria', item: 'Laptop Bag' },
        { type: 'order', name: 'Foluke Adebayo', location: 'Lagos, Nigeria', item: 'Hair Dryer' },
        { type: 'order', name: 'Segun Williams', location: 'Lagos, Nigeria', item: 'Gaming Console' },
        { type: 'order', name: 'Bisi Adeleke', location: 'Lagos, Nigeria', item: 'Sneakers' },
        { type: 'order', name: 'Kunle Bakare', location: 'Lagos, Nigeria', item: 'Bluetooth Earbuds' },
        { type: 'order', name: 'Ronke Ogunbiyi', location: 'Lagos, Nigeria', item: 'Designer Handbag' },
        
        { type: 'order', name: 'Chinedu Nwachukwu', location: 'Owerri, Nigeria', item: 'Gaming Laptop' },
        { type: 'order', name: 'Precious Okafor', location: 'Owerri, Nigeria', item: 'Running Shoes' },
        { type: 'order', name: 'Amara Obi', location: 'Owerri, Nigeria', item: 'Smart TV' },
        { type: 'order', name: 'Chibuzor Ibekwe', location: 'Owerri, Nigeria', item: 'Fitness Tracker' },
        { type: 'order', name: 'Nkechi Okoro', location: 'Owerri, Nigeria', item: 'Perfume Set' },
        { type: 'order', name: 'Uchenna Nwosu', location: 'Owerri, Nigeria', item: 'Tablet' },
        { type: 'order', name: 'Ifeanyi Okafor', location: 'Owerri, Nigeria', item: 'Sunglasses' },
        { type: 'order', name: 'Adaobi Nwankwo', location: 'Owerri, Nigeria', item: 'Jewelry Box' },
        { type: 'order', name: 'Chukwudi Eze', location: 'Owerri, Nigeria', item: 'Power Bank' },
        { type: 'order', name: 'Obinna Iheme', location: 'Owerri, Nigeria', item: 'Leather Jacket' },
        
        { type: 'order', name: 'Ibrahim Bello', location: 'Abuja, Nigeria', item: 'Premium Watch' },
        { type: 'order', name: 'Fatima Abubakar', location: 'Abuja, Nigeria', item: 'Laptop Backpack' },
        { type: 'order', name: 'Musa Ahmed', location: 'Abuja, Nigeria', item: 'Wireless Headphones' },
        { type: 'order', name: 'Aisha Mohammed', location: 'Abuja, Nigeria', item: 'Designer Dress' },
        { type: 'order', name: 'Usman Ibrahim', location: 'Abuja, Nigeria', item: 'Smartphone' },
        { type: 'order', name: 'Hauwa Suleiman', location: 'Abuja, Nigeria', item: 'Makeup Collection' },
        { type: 'order', name: 'Aliyu Bello', location: 'Abuja, Nigeria', item: 'Fitness Equipment' },
        { type: 'order', name: 'Zainab Musa', location: 'Abuja, Nigeria', item: 'Handbag' },
        { type: 'order', name: 'Sani Usman', location: 'Abuja, Nigeria', item: 'Bluetooth Speaker' },
        { type: 'order', name: 'Rukayya Ibrahim', location: 'Abuja, Nigeria', item: 'Sneakers' },
        
        { type: 'order', name: 'Aisha Bello', location: 'Kano, Nigeria', item: 'LED TV' },
        { type: 'order', name: 'Musa Lawan', location: 'Kano, Nigeria', item: 'Gaming Mouse' },
        { type: 'order', name: 'Fatima Sani', location: 'Kano, Nigeria', item: 'Smart Watch' },
        { type: 'order', name: 'Ibrahim Garba', location: 'Kano, Nigeria', item: 'Leather Bag' },
        { type: 'order', name: 'Hassan Musa', location: 'Kano, Nigeria', item: 'Phone Case' },
        { type: 'order', name: 'Rabi Abdullahi', location: 'Kano, Nigeria', item: 'Perfume' },
        { type: 'order', name: 'Aminu Ibrahim', location: 'Kano, Nigeria', item: 'Sneakers' },
        { type: 'order', name: 'Mariam Bello', location: 'Kano, Nigeria', item: 'Necklace' },
        { type: 'order', name: 'Nasiru Adamu', location: 'Kano, Nigeria', item: 'Power Bank' },
        
        { type: 'order', name: 'Ahmed Musa', location: 'Kaduna, Nigeria', item: 'Smartphone' },
        { type: 'order', name: 'Hauwa Bello', location: 'Kaduna, Nigeria', item: 'Handbag' },
        { type: 'order', name: 'Sani Adamu', location: 'Kaduna, Nigeria', item: 'Bluetooth Earbuds' },
        { type: 'order', name: 'Amina Yusuf', location: 'Kaduna, Nigeria', item: 'Dress' },
        { type: 'order', name: 'Usman Garba', location: 'Kaduna, Nigeria', item: 'Wrist Watch' },
        { type: 'order', name: 'Zainab Abdullahi', location: 'Kaduna, Nigeria', item: 'Sunglasses' },
        { type: 'order', name: 'Abdul Lawal', location: 'Kaduna, Nigeria', item: 'Backpack' },
        { type: 'order', name: 'Rukayya Musa', location: 'Kaduna, Nigeria', item: 'Makeup Kit' },
        
        // Delivery sent notifications - 40 items
        { type: 'delivery', name: 'Chinedu Nwachukwu', location: 'Lagos, Nigeria', item: 'Laptop', carrier: 'DHL' },
        { type: 'delivery', name: 'Aisha Bello', location: 'Kano, Nigeria', item: 'Smart TV', carrier: 'FedEx' },
        { type: 'delivery', name: 'Tunde Bakare', location: 'Lagos, Nigeria', item: 'Smartwatch', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Precious Okafor', location: 'Owerri, Nigeria', item: 'Sneakers', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Ibrahim Bello', location: 'Abuja, Nigeria', item: 'Watch', carrier: 'DHL' },
        { type: 'delivery', name: 'Ahmed Musa', location: 'Kaduna, Nigeria', item: 'Smartphone', carrier: 'FedEx' },
        { type: 'delivery', name: 'Chioma Eze', location: 'Lagos, Nigeria', item: 'Blender', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Musa Lawan', location: 'Kano, Nigeria', item: 'Gaming Mouse', carrier: 'Aramex' },
        { type: 'delivery', name: 'Blessing Okoro', location: 'Lagos, Nigeria', item: 'Perfume', carrier: 'DHL' },
        { type: 'delivery', name: 'Uchenna Nwosu', location: 'Owerri, Nigeria', item: 'Tablet', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Fatima Abubakar', location: 'Abuja, Nigeria', item: 'Backpack', carrier: 'UPS' },
        { type: 'delivery', name: 'Nasiru Adamu', location: 'Kano, Nigeria', item: 'Power Bank', carrier: 'FedEx' },
        { type: 'delivery', name: 'Kehinde Ogunleye', location: 'Lagos, Nigeria', item: 'Laptop Bag', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Chibuzor Ibekwe', location: 'Owerri, Nigeria', item: 'Fitness Tracker', carrier: 'DHL' },
        { type: 'delivery', name: 'Aliyu Bello', location: 'Abuja, Nigeria', item: 'Fitness Equipment', carrier: 'Aramex' },
        { type: 'delivery', name: 'Abdul Lawal', location: 'Kaduna, Nigeria', item: 'Backpack', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Segun Williams', location: 'Lagos, Nigeria', item: 'Gaming Console', carrier: 'UPS' },
        { type: 'delivery', name: 'Ifeanyi Okafor', location: 'Owerri, Nigeria', item: 'Sunglasses', carrier: 'FedEx' },
        { type: 'delivery', name: 'Musa Ahmed', location: 'Abuja, Nigeria', item: 'Headphones', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Hassan Musa', location: 'Kano, Nigeria', item: 'Phone Case', carrier: 'DHL' },
        { type: 'delivery', name: 'Foluke Adebayo', location: 'Lagos, Nigeria', item: 'Hair Dryer', carrier: 'Aramex' },
        { type: 'delivery', name: 'Nkechi Okoro', location: 'Owerri, Nigeria', item: 'Perfume', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Sani Usman', location: 'Abuja, Nigeria', item: 'Speaker', carrier: 'UPS' },
        { type: 'delivery', name: 'Mariam Bello', location: 'Kano, Nigeria', item: 'Necklace', carrier: 'FedEx' },
        { type: 'delivery', name: 'Bisi Adeleke', location: 'Lagos, Nigeria', item: 'Sneakers', carrier: 'DHL' },
        { type: 'delivery', name: 'Adaobi Nwankwo', location: 'Owerri, Nigeria', item: 'Jewelry Box', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Usman Ibrahim', location: 'Abuja, Nigeria', item: 'Smartphone', carrier: 'Aramex' },
        { type: 'delivery', name: 'Rabi Abdullahi', location: 'Kano, Nigeria', item: 'Perfume', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Kunle Bakare', location: 'Lagos, Nigeria', item: 'Earbuds', carrier: 'UPS' },
        { type: 'delivery', name: 'Chukwudi Eze', location: 'Owerri, Nigeria', item: 'Power Bank', carrier: 'DHL' },
        { type: 'delivery', name: 'Hauwa Suleiman', location: 'Abuja, Nigeria', item: 'Makeup Collection', carrier: 'FedEx' },
        { type: 'delivery', name: 'Aminu Ibrahim', location: 'Kano, Nigeria', item: 'Sneakers', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Ronke Ogunbiyi', location: 'Lagos, Nigeria', item: 'Handbag', carrier: 'Aramex' },
        { type: 'delivery', name: 'Obinna Iheme', location: 'Owerri, Nigeria', item: 'Leather Jacket', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Zainab Musa', location: 'Abuja, Nigeria', item: 'Handbag', carrier: 'UPS' },
        { type: 'delivery', name: 'Samuel Yusuf', location: 'Kaduna, Nigeria', item: 'Wireless Mouse', carrier: 'DHL' },
        { type: 'delivery', name: 'Joseph Adeleke', location: 'Lagos, Nigeria', item: 'Monitor', carrier: 'FedEx' },
        { type: 'delivery', name: 'Lucas Adebayo', location: 'Lagos, Nigeria', item: 'Air Conditioner', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Eric Nshimiyimana', location: 'Abuja, Nigeria', item: 'Mattress', carrier: 'Vefiri Logistics' },
        { type: 'delivery', name: 'Patrick Mwangi', location: 'Lagos, Nigeria', item: 'Running Shoes', carrier: 'Vefiri Logistics' }
    ];
    
    const container = document.getElementById('liveNotificationContainer');
    
    function getRandomNotification() {
        const randomIndex = Math.floor(Math.random() * notifications.length);
        return notifications[randomIndex];
    }
    
    function getRandomTime() {
        const times = ['just now', '30 seconds ago', '1 minute ago', '2 minutes ago', '3 minutes ago', '5 minutes ago', '8 minutes ago', '10 minutes ago', '12 minutes ago', '15 minutes ago'];
        return times[Math.floor(Math.random() * times.length)];
    }
    
    function createNotificationElement(notification) {
        const isDelivery = notification.type === 'delivery';
        const badgeColor = isDelivery ? 'bg-green-50 text-green-700' : 'bg-blue-50 text-blue-700';
        const badgeText = isDelivery ? 'Delivery' : 'Order';
        const actionText = isDelivery ? 'Delivery sent' : 'Order placed';
        const timeText = getRandomTime();
        const deliveryCarrier = isDelivery ? ` via ${notification.carrier}` : '';
        
        const div = document.createElement('div');
        div.className = 'notification-item bg-white  shadow-md border border-gray-100 w-80 transform transition-all duration-500 opacity-0 -translate-x-full';
        div.innerHTML = `
            <div class="px-3 py-2">
                <div class="flex items-start gap-2">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1 flex-wrap">
                            <span class="font-semibold text-gray-800 text-xs">${notification.name}</span>
                            <span class="text-gray-400 text-xs">·</span>
                            <span class="text-gray-500 text-xs">${notification.location}</span>
                        </div>
                        <div class="mt-0.5">
                            <span class="text-gray-600 text-xs">${actionText}</span>
                            <span class="font-medium text-gray-800 text-xs"> "${notification.item}"</span>
                            ${deliveryCarrier ? `<span class="text-gray-400 text-xs">${deliveryCarrier}</span>` : ''}
                        </div>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-green-500 text-xs">●</span>
                            <span class="text-gray-400 text-xs">Live</span>
                            <span class="text-gray-300 text-xs">·</span>
                            <span class="text-gray-400 text-xs">${timeText}</span>
                        </div>
                    </div>
                    <div class="flex-shrink-0 flex items-center gap-1">
                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium ${badgeColor}">
                            ${badgeText}
                        </span>
                        <button onclick="this.closest('.notification-item').remove()" class="text-gray-300 hover:text-gray-500 transition-colors ml-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        return div;
    }
    
    function autoRemoveNotification(element) {
        setTimeout(() => {
            if (element && element.parentNode) {
                element.style.opacity = '0';
                element.style.transform = 'translateX(-100%)';
                setTimeout(() => {
                    if (element.parentNode) element.remove();
                }, 300);
            }
        }, 5000);
    }
    
    function showNotification() {
        if (container.children.length >= 3) {
            const oldest = container.firstChild;
            if (oldest) {
                oldest.style.opacity = '0';
                oldest.style.transform = 'translateX(-100%)';
                setTimeout(() => {
                    if (oldest.parentNode) oldest.remove();
                }, 300);
            }
        }
        
        const notification = getRandomNotification();
        const notificationElement = createNotificationElement(notification);
        container.appendChild(notificationElement);
        
        setTimeout(() => {
            notificationElement.style.opacity = '1';
            notificationElement.style.transform = 'translateX(0)';
        }, 50);
        
        autoRemoveNotification(notificationElement);
    }
    
    let notificationInterval;
    
    function startNotifications() {
        if (notificationInterval) clearInterval(notificationInterval);
        
        setTimeout(() => {
            showNotification();
        }, 2000);
        
        notificationInterval = setInterval(() => {
            showNotification();
        }, 7000);
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        startNotifications();
        
        container.addEventListener('mouseenter', function() {
            if (notificationInterval) {
                clearInterval(notificationInterval);
                notificationInterval = null;
            }
        });
        
        container.addEventListener('mouseleave', function() {
            if (!notificationInterval) {
                notificationInterval = setInterval(() => {
                    showNotification();
                }, 7000);
            }
        });
    });
    
    window.addEventListener('beforeunload', function() {
        if (notificationInterval) {
            clearInterval(notificationInterval);
        }
    });
</script>

<style>
    .notification-item {
        transition: opacity 0.3s ease, transform 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }
    
    .notification-item:hover {
        transform: translateX(2px) !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
</style>