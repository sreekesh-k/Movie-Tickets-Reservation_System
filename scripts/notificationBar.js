// Array of messages
const messages = [
    "Movie night awaits!",
    "Lights, camera, action!",
    "Grab your popcorn and book now!",
    "Don't miss out on the show!",
    "Your movie adventure starts here!",
    "Escape into the world of cinema!",
    "Get ready for blockbuster thrills!",
    "Movie magic is just a click away!",
    "Experience the silver screen!",
    "Unleash your inner cinephile!",
    "Make tonight unforgettable with a movie!",
    "Discover the latest releases!",
    "Let the movies take you on a journey!",
    "Elevate your movie experience!",
    "Lights dim, screens bright, book your tickets tonight!",
    "From classics to new releases, find your movie!",
    "Get cozy and prepare for cinematic delight!",
    "Movie buffs, rejoice! Your show awaits!",
    "Adventure, romance, or comedy? Your pick!",
    "Step into the world of entertainment!"
];


// Function to change message and set timer for fading out
function changeMessage() {
    const messageElement = document.getElementById("message");
    const randomIndex = Math.floor(Math.random() * messages.length);
    const message = messages[randomIndex];
    messageElement.innerHTML = message;
    setTimeout(() => {
        messageElement.style.opacity = "0";
    }, 3000); // Adjust the duration of visibility before fading out
}

// Initial message change
changeMessage();

// Interval to change message and fade in/out
setInterval(() => {
    const messageElement = document.getElementById("message");
    messageElement.style.opacity = "1";
    changeMessage();
}, 4000); // Adjust the duration between message changes
