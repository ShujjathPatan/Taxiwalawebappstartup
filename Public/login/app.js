const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});


// Get a reference to the Firebase Realtime Database
const database = firebase.database();

// Get the current user's information
const user = firebase.auth().currentUser;

// Store the user's information in the Firebase Realtime Database
database.ref('users/' + user.uid).set({
  email: user.email,
  name: user.displayName,
  profile_picture : user.photoURL
});
