$(document).ready(function () {
    // Check the initial theme from localStorage
    let initialTheme = JSON.parse(localStorage.getItem("PageTheme"));
    if (initialTheme === "DARK") {
        $("#myContainer").addClass("theme");
    }

    // Toggle theme when button is clicked
    $("#mybtn").click(function () {
        $("#myContainer").toggleClass("theme");

        // Save the current theme to localStorage
        let theme = $("#myContainer").hasClass("theme") ? "DARK" : "LIGHT";
        localStorage.setItem("PageTheme", JSON.stringify(theme));

        // Update the icon and card color
        updateColors(theme);

        // Send AJAX request to simulate server-side update
        simulateServerUpdate(theme);
    });

    // Check and apply the theme periodically
    setInterval(function () {
        let storedTheme = JSON.parse(localStorage.getItem("PageTheme"));
        if (storedTheme === "DARK") {
            $("#myContainer").addClass("theme");
        } else {
            $("#myContainer").removeClass("theme");
        }

        // Update the icon and card color
        updateColors(storedTheme);
    }, 1000); // Adjust the interval as needed
});

// Simulate server-side update
function simulateServerUpdate(theme) {
    $.ajax({
        type: "POST",
        url: "dummy_endpoint", // Replace with a dummy endpoint or remove if not needed
        data: { theme: theme },
        success: function (response) {
            console.log(response); // Log the server response (optional)
        },
        error: function (error) {
            console.error("Error updating theme:", error);
        }
    });
}

// Function to update the icon and card color
function updateColors(theme) {
    let icon = $(".icon");
    // let link = $("a");
    let i = $("i");
    let footerTitle = $(".footer-title span");

    if (theme === "DARK") {
        icon.css("color", "#0bceaf");
        // link.css("color", "#0bceaf");
        i.css("color", "#0bceaf");
        footerTitle.css("color", "#0bceaf");


    } else {
        icon.css("color", "#FFC213");
        // link.css("color", "#FFC213");
        i.css("color", "#FFC213");
        footerTitle.css("color", "#FFC213");
    }
}


