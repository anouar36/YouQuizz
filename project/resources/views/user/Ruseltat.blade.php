<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result Template</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-purple-200 min-h-screen flex items-center justify-center">
    <div id="result-container" class="bg-white shadow-2xl rounded-2xl p-8 w-96 text-center transform transition-all duration-700 opacity-0 scale-90">
        <div class="mb-6">
            <h1 id="result-title" class="text-3xl font-bold text-gray-800 mb-4 transform transition-all duration-700 translate-y-10 opacity-0">Quiz Completed!</h1>
            
            <div id="score-circle" class="w-48 h-48 mx-auto mb-6 rounded-full flex items-center justify-center shadow-lg transform transition-all duration-700 scale-50 opacity-0">
                <span id="score-text" class="text-5xl font-extrabold text-white"></span>
            </div>
            
            <p id="result-message" class="text-lg text-gray-600 mb-4 transform transition-all duration-700 translate-y-10 opacity-0"></p>
            
            <div class="flex justify-between space-x-4">
                <button id="retry-btn" class="flex-1 bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transform transition-all duration-300 hover:scale-105 opacity-0">
                    Retry Quiz
                </button>
                <button id="home-btn" class="flex-1 bg-gray-200 text-gray-700 py-2 rounded-lg hover:bg-gray-300 transform transition-all duration-300 hover:scale-105 opacity-0">
                    Home
                </button>
            </div>
        </div>
    </div>

    <script>
        // Quiz Result Animation Script
        document.addEventListener('DOMContentLoaded', () => {
            const resultContainer = document.getElementById('result-container');
            const resultTitle = document.getElementById('result-title');
            const scoreCircle = document.getElementById('score-circle');
            const scoreText = document.getElementById('score-text');
            const resultMessage = document.getElementById('result-message');
            const retryBtn = document.getElementById('retry-btn');
            const homeBtn = document.getElementById('home-btn');

            // Simulate quiz result (replace with actual quiz logic)
            const totalQuestions = 10;
            const correctAnswers = {{$Score}};
            const percentage = Math.round((correctAnswers / totalQuestions) * 100);
            
            // Set status and color based on score
            let isWin = correctAnswers >= 5;
            let resultStatus = isWin ? "You are Won!" : "You are Lost!";
            let statusColor = isWin ? "bg-green-500" : "bg-orange-500";
            
            // Apply color to score circle
            scoreCircle.classList.add(statusColor);

            // Animate result display
            function initializeAnimation() {
                // Reveal container
                setTimeout(() => {
                    resultContainer.classList.remove('opacity-0', 'scale-90');
                    resultContainer.classList.add('opacity-100', 'scale-100');
                }, 100);

                // Animate title
                setTimeout(() => {
                    resultTitle.textContent = resultStatus;
                    resultTitle.classList.remove('translate-y-10', 'opacity-0');
                    resultTitle.classList.add('translate-y-0', 'opacity-100');
                }, 300);

                // Animate score circle
                setTimeout(() => {
                    scoreCircle.classList.remove('scale-50', 'opacity-0');
                    scoreCircle.classList.add('scale-100', 'opacity-100');
                    
                    // Animate score counting
                    animateValue(scoreText, 0, correctAnswers, 1000);
                }, 600);

                // Animate result message
                setTimeout(() => {
                    resultMessage.textContent = getResultMessage(percentage, isWin);
                    resultMessage.classList.remove('translate-y-10', 'opacity-0');
                    resultMessage.classList.add('translate-y-0', 'opacity-100');
                }, 900);

                // Animate buttons
                setTimeout(() => {
                    retryBtn.classList.remove('opacity-0');
                    retryBtn.classList.add('opacity-100');
                    homeBtn.classList.remove('opacity-0');
                    homeBtn.classList.add('opacity-100');
                }, 1200);
            }

            // Animate number counting
            function animateValue(element, start, end, duration) {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    element.textContent = Math.floor(progress * (end - start) + start);
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            }

            // Generate result message based on percentage and win status
            function getResultMessage(percentage, isWin) {
                if (isWin) {
                    if (percentage >= 90) return "Excellent! You're a quiz master!";
                    if (percentage >= 70) return "Great job! Keep learning!";
                    return "Good effort! You passed the quiz!";
                } else {
                    if (percentage >= 40) return "Almost there! Try again!";
                    if (percentage >= 20) return "Keep practicing. You'll get better!";
                    return "Don't give up! Everyone starts somewhere!";
                }
            }

            // Button event listeners
            retryBtn.addEventListener('click', () => {
                // Add your retry quiz logic here
                alert('Retry Quiz Clicked');
            });

            homeBtn.addEventListener('click', () => {
                // Add your home/navigation logic here
                alert('Home Clicked');
            });

            // Initialize animation on page load
            initializeAnimation();
        });
    </script>
</body>
</html>