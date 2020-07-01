$(document).ready(function () {
    get_images();
});
function get_images() {
    $.ajax({
        url: "/author_get_images",
        method: "GET",
        dataType: "json",
        data: {
            _token: csrf
        },
        success: function (data) {
            var score = {
                correct: 0,
                done: 0
            };
            fill_author_image(score, data, 0);
        },
        error: function (err) {
            $("#error_text").html(err.responseText);
        }
    });
}
function fill_author_image(score, author_images, which_image) {
    var game_section = document.getElementById("author_game");
    if (score.done == author_images.length) {
        var percentage = (score.correct / score.done) * 100;
        game_section.innerHTML = `<h3>Congratulations!</h3>
            <p>You had ${percentage}% correct answers.</p>
            <button id="try_again">Try Again?</button>`;
        $("#try_again").on("click", function() {
            score.correct = 0;
            score.done = 0;
            fill_author_image(score, author_images, 0);
        });
    } else {
        game_section.innerHTML = `<h3>Can you guess if author is on the image?</h3>
        <p>Try your luck and see the score...</p>
        <img src="${author_images[which_image].author_image}" alt="Author Image ${author_images[which_image].id}"/>
        <div class="author_game_buttons"><button id="yes_button">Yes</button><button id="no_button">No</button></div>`;
        $("#yes_button").on("click", function() {
            author_button_click(score, author_images, which_image, true);
        });
        $("#no_button").on("click", function() {
            author_button_click(score, author_images, which_image, false);
        });
    }
}
function author_button_click(score, author_images, which_image, yes_no) {
    var round_result = (author_images[which_image].is_author == yes_no);
    score.done++;
    if(round_result) { score.correct++; }
    fill_author_image(score, author_images, which_image + 1);
}
