// Simulating fetching a user's name from a database
const userName = "Nora"; // This should come from your database

// Array of quotes
const quotes = [
    "The only way to do great work is to love what you do. – Steve Jobs",
    "It does not matter how slowly you go as long as you do not stop. – Confucius",
    "Success is not the key to happiness. Happiness is the key to success. If you love what you are doing, you will be successful. – Albert Schweitzer",
    "Hardships often prepare ordinary people for an extraordinary destiny. – C.S. Lewis",
    "Believe you can and you're halfway there. – Theodore Roosevelt",
    "The future belongs to those who believe in the beauty of their dreams. – Eleanor Roosevelt",
    "You are never too old to set another goal or to dream a new dream. – C.S. Lewis",
    "What you get by achieving your goals is not as important as what you become by achieving your goals. – Zig Ziglar",
    "You don't have to see the whole staircase, just take the first step. – Martin Luther King Jr.",
    "Motivation is what gets you started. Habit is what keeps you going. – Jim Ryun"
];


function updateWelcomeText() {
    const now = new Date();
    const hour = now.getHours();
    let greeting;

    if(hour < 12) {
        greeting = "Good Morning";
    } else if(hour < 18) {
        greeting = "Good Afternoon";
    } else {
        greeting = "Good Evening";
    }

    // Update the welcome text
    document.querySelector('.welcome-text').innerHTML = `${greeting}, <span class="text-black fw-bold" id="userName">${userName}</span>`;
}

function displayRandomQuote() {
    const quoteIndex = Math.floor(Math.random() * quotes.length);
    document.getElementById('quote').textContent = quotes[quoteIndex];
}

// Setting the user's name from the variable
document.getElementById('userName').textContent = userName;

// Calling the functions
updateWelcomeText();
displayRandomQuote();
