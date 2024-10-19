<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

defineProps({
    title: String,
});

const timeLeft = ref({
    dailyReward: '',
    levelUp: '',
    spinToWin: ''
});

const updateCountdown = () => {
    // Здесь обновляем оставшееся время
    timeLeft.value.dailyReward = '18:48:21';
    timeLeft.value.levelUp = '12:56:58';
    timeLeft.value.spinToWin = '14:12:41';
};

onMounted(() => {
    updateCountdown();
    setInterval(updateCountdown, 1000);
});
</script>

<template>
    <Head :title="title" />

    <div class="min-h-screen bg-gradient-to-b from-gray-900 via-gray-800 to-gray-700 text-white overflow-hidden relative">
        <!-- Динамичные фоновые элементы -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="bg-gradient-to-br from-purple-800 to-blue-600 rounded-full h-96 w-96 opacity-20 blur-3xl top-0 right-0 animate-move-bg"></div>
            <div class="bg-gradient-to-br from-pink-700 to-purple-600 rounded-full h-72 w-72 opacity-20 blur-3xl bottom-0 left-0 animate-move-bg-reverse"></div>
        </div>
        
        <div class="max-w-md mx-auto px-4 py-6 flex flex-col min-h-screen space-y-6 animate-fade-in relative z-10">
            <!-- Заголовок -->
            <header class="flex justify-between items-center mb-6 animate-fade-in-down">
                <div class="flex items-center space-x-3">
                    <img src="https://via.placeholder.com/40" alt="Avatar" class="w-12 h-12 rounded-full shadow-lg border border-gray-700 hover:scale-110 transition-transform duration-300">
                    <div>
                        <h1 class="font-semibold text-xl">Arafat Litoun</h1>
                        <p class="text-sm text-blue-400">LVL 7/10</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm text-blue-400">+280</p>
                    <p class="text-xs">Per hour</p>
                </div>
            </header>

            <!-- Статус карточки -->
            <div class="grid grid-cols-3 gap-3 mb-6 animate-fade-in-up">
                <div v-for="(time, key) in timeLeft" :key="key" class="status-card transition-transform transform hover:scale-105">
                    <p class="text-xs mb-1 text-gray-400">{{ key.replace(/([A-Z])/g, ' $1').trim() }}</p>
                    <p class="text-lg font-bold text-blue-300">{{ time }}</p>
                </div>
            </div>

            <!-- Баланс токенов -->
            <div class="text-center mb-6 animate-fade-in">
                <p class="text-5xl font-extrabold text-blue-400 tracking-wider scale-95 hover:scale-100 transition-transform duration-500">19,421,541</p>
            </div>

            <!-- Карточка персонажа -->
            <div class="bg-gradient-to-b from-blue-900 to-blue-600 rounded-xl p-6 mb-6 flex-grow flex flex-col justify-center items-center shadow-xl animate-fade-in-up">
                <img src="https://via.placeholder.com/200" alt="Character" class="w-40 h-40 mb-4 object-cover rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
                <p class="text-sm mb-2 text-gray-300">1800 / 1800</p>
                <button class="bg-blue-500 hover:bg-blue-600 transition-colors text-white px-6 py-2 rounded-full text-sm font-medium shadow-md hover:shadow-lg transition-shadow duration-300">
                    Customize your appearance
                </button>
            </div>

            <!-- Навигация -->
            <nav class="flex justify-between items-center bg-gray-800 rounded-lg p-2 shadow-lg animate-slide-in-up">
                <button v-for="item in ['Home', 'Cards', 'Tasks', 'Friends', 'Airdrop']" :key="item" class="nav-button flex-1 text-gray-400 hover:text-blue-400 transition-colors hover:scale-105 transform duration-300">
                    <i :class="['fas', `fa-${item.toLowerCase()}`, 'mb-1 text-lg']"></i>
                    <p class="text-xs">{{ item }}</p>
                </button>
            </nav>
        </div>
    </div>
</template>

<style scoped>
@media (max-height: 700px) {
    .min-h-screen {
        min-height: auto;
    }
}

/* Плавные анимации */
@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInDown {
    0% { opacity: 0; transform: translateY(-20px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes slideInDown {
    0% { transform: translateY(-100px); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
}

@keyframes slideInUp {
    0% { transform: translateY(100px); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
}

@keyframes bounceIn {
    0% { transform: scale(0.5); opacity: 0; }
    60% { transform: scale(1.2); opacity: 1; }
    100% { transform: scale(1); }
}

/* Движущиеся фоновые элементы */
@keyframes moveBg {
    0% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-30px) rotate(180deg); }
    100% { transform: translateY(0) rotate(360deg); }
}

@keyframes moveBgReverse {
    0% { transform: translateY(0) rotate(360deg); }
    50% { transform: translateY(30px) rotate(180deg); }
    100% { transform: translateY(0) rotate(0deg); }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-in-out forwards;
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-in-out forwards;
}

.animate-fade-in-down {
    animation: fadeInDown 0.8s ease-in-out forwards;
}

.animate-slide-in-down {
    animation: slideInDown 0.8s ease-in-out forwards;
}

.animate-slide-in-up {
    animation: slideInUp 0.8s ease-in-out forwards;
}

.animate-bounce-in {
    animation: bounceIn 0.9s ease-in-out forwards;
}

/* Анимация движения фона */
.animate-move-bg {
    animation: moveBg 15s infinite ease-in-out;
}

.animate-move-bg-reverse {
    animation: moveBgReverse 15s infinite ease-in-out;
}

/* Статус карточки */
.status-card {
    background: linear-gradient(to right, #1f1f1f, #292929);
    padding: 1rem;
    border-radius: 0.375rem;
    text-align: center;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease, background-color 0.3s ease;
}

.status-card:hover {
    background: linear-gradient(to right, #2d2d2d, #353535);
}

/* Навигационная кнопка */
.nav-button {
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.nav-button:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.shadow-lg {
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
}

.shadow-xl {
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4);
}
</style>
