const cardsContainer = document.querySelector(".container");
const cards = cardsContainer.querySelectorAll(".mcard");

let currentIndex = 0;

function setActiveCard(index) {
  cards.forEach((card, i) => {
    card.classList.toggle("active", i === index);
  });
}

function nextCard() {
  currentIndex = (currentIndex + 1) % cards.length;
  setActiveCard(currentIndex);
}

// Set an interval to switch to the next card every 3 seconds (adjust as needed)
const intervalId = setInterval(nextCard, 5000);

// Stop the interval when the user clicks on a card
cardsContainer.addEventListener("click", (e) => {
  const target = e.target.closest(".mcard");
  setActiveCard(currentIndex);
  if (!target) return;

  cardsContainer.querySelectorAll(".mcard").forEach((card) => {
    card.classList.remove("active");
  });

  target.classList.add("active");
});

// Initial setup: set the first card as active
setActiveCard(currentIndex);
