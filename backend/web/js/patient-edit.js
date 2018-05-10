window.onload = function() {
    function updateNavButtons(container, prevButton, nextButton) {
        $(container).is(':first-child')
            ? $(prevButton).hide()
            : $(prevButton).show();
        $(container).is(':last-child')
            ? $(nextButton).hide()
            : $(nextButton).show();
    }

    var $tabs = $('#patient-update-tabs'),
        $buttonBack = $('#go-back'),
        $buttonNext = $('#go-forward');

    $tabs.on('shown.bs.tab', 'a', function () {
        updateNavButtons($(this).parents('li:first'), $buttonBack, $buttonNext);
    });
    updateNavButtons($tabs.find('li.active'), $buttonBack, $buttonNext);

    $buttonBack.click(function () {
        $tabs.find('li.active').prev().find('a:first').click();
        $(this).parents('li').blur();
        return false;
    });
    $buttonNext.click(function () {
        $tabs.find('li.active').next().find('a:first').click();
        $(this).blur();
        return false;
    });
};
