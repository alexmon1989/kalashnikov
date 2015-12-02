$(function() {
    showAnotherVacancyField = function() {
        if ($("#vacancy_id").val() == 'another') {
            $("#another_vacancy").fadeIn();
        } else {
            $("#another_vacancy").fadeOut();
        }
    }
    $("#vacancy_id").change(showAnotherVacancyField);
    showAnotherVacancyField();
});