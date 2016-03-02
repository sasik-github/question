/**
 * Created by sasik on 3/1/16.
 */

var Quiz = {
    QUESTION_URL: '/question/all',
    Questions: [],
    current: 0,
    SelectedAnswers: [],
};

var AJAX = {
    doneCallback: function(resp) {
        console.log(resp);

        Quiz.Questions = resp;

        ProgressBar.setTotalCount(Quiz.Questions.length);

        QUESTION.render();
    }
};

var HTML = {
    ProgressBarId : '#progress-bar',
    ProgressBarLabelId : '#progress-bar-label',
    QuestionTotalCountId: '#question-count',
    QuestionCurrentNumberId: '#question-current-number',

    NextQuestionButtonId: '#next-question-btn',
    PrevQuestionButtonId: '#prev-question-btn',
    SubmitButtonId : "#submit-btn",
    HiddenInputContainer : '#hidden-inputs-container',

    QuestionTextId: "#question-text",
    AnswersContainerId: "#answers-container",

    SubmitFormId : '#submit-form',



};

var ProgressBar = {
    progress : 0,

    $progressBar : $(HTML.ProgressBarId),

    $questionTotalCount : $(HTML.QuestionTotalCountId),

    $questionCurrentNumber : $(HTML.QuestionCurrentNumberId),

    setProgress : function (value) {
        this.progress = value;
        this.$progressBar.width(value + '%');
        //console.log($progressBar);

    },

    getProgress : function () {
        return this.progress;
        return this.$progressBar.width();
    },

    setTotalCount : function(count) {
        this.$questionTotalCount.text(count);
        this.setProgress(this.getStep());
    },
    
    getStep : function () {
        return 100 / Quiz.Questions.length;
    },

    stepForward: function () {
        var step = this.getStep(),
            currProgress = this.getProgress();

        //console.log(step);
        //console.log(currProgress);
        this.setProgress(currProgress + step);
    },

    stepBackward: function () {
        var step = this.getStep(),
            currProgress = this.getProgress();

        this.setProgress(currProgress - step);
    },

    setCurrentQuestionNumber : function (currQuestionNumber) {
        this.$questionCurrentNumber.text(currQuestionNumber + 1);
    }
};


var CONTROLS = {

    $prevButton : $(HTML.PrevQuestionButtonId),

    $nextButton : $(HTML.NextQuestionButtonId),

    $submitButton : $(HTML.SubmitButtonId),

    $answersContainer : $(HTML.AnswersContainerId),

    $hiddenInputContainer : $(HTML.HiddenInputContainer),

    $submitForm : $(HTML.SubmitFormId),

    /**
     * dynamic elements that why i made that like function
     * @returns {*|jQuery|HTMLElement}
     */
    $answersInputs : function() { return $(HTML.AnswersContainerId + ' input') },

    render : function () {

        return 0;
    },

    nextQuestion : function () {

        ProgressBar.stepForward();
        Quiz.current++;
        console.log(Quiz.current);

        //this.someFunction();
        ProgressBar.setCurrentQuestionNumber(Quiz.current);
        QUESTION.render();

    },

    prevQuestion : function () {
        ProgressBar.stepBackward();
        Quiz.current--;

        ProgressBar.setCurrentQuestionNumber(Quiz.current);
        QUESTION.render();

    },

    setDisabledButton : function ($button, val) {
        console.log('setDisabledButton');
        if (val) {
            $button.addClass('disabled');
        } else {
            $button.removeClass('disabled');
        }

    },
    
    checkAnswer : function () {
        Quiz.SelectedAnswers[Quiz.current] = CONTROLS.$answersContainer.find('input:checked').attr('id');
        CONTROLS.enableNextButton();
    },
    
    enableNextButton : function () {
        console.log('enableNextButton');
        if (Quiz.SelectedAnswers[Quiz.current]) {
            console.log('enable');
            CONTROLS.setDisabledButton(CONTROLS.$nextButton, false);
        } else {
            console.log('disable');
            CONTROLS.setDisabledButton(CONTROLS.$nextButton, true);
        }
    },
    
    submit : function (event) {

        CONTROLS.$hiddenInputContainer.empty();

        for (index in Quiz.SelectedAnswers) {
            CONTROLS.makeHiddenInput(index, Quiz.SelectedAnswers[index]);
        }

    },
    
    makeHiddenInput : function (name, value) {
        CONTROLS.$hiddenInputContainer.append('<input name="answers[' + name + ']" value="' + value + '">');
    }

};

CONTROLS.$prevButton.click(CONTROLS.prevQuestion);
CONTROLS.$nextButton.click(CONTROLS.nextQuestion);
CONTROLS.$answersContainer.change(CONTROLS.enableNextButton());
CONTROLS.$submitForm.submit(CONTROLS.submit);


var QUESTION = {

    $questionText : $(HTML.QuestionTextId),

    $answersContainer : $(HTML.AnswersContainerId),

    makeQuestion : function (question) {
        this.$questionText.text(question.question);

        var checkedAnswerId = '';

        if (Quiz.SelectedAnswers[Quiz.current]) {
            checkedAnswerId = Quiz.SelectedAnswers[Quiz.current];
        }
        //else {
        //    //for (first in question.answers) break;
        //    //checkedAnswerId = first;
        //}

        for (answerId in question.answers) {
            var checked = (checkedAnswerId == answerId) ? true : false;

            this.$answersContainer.append(ANSWERS.makeHtml(answerId, question.answers[answerId], checked));
        }
        //CONTROLS.checkAnswer();
    },

    render : function () {
        this.$answersContainer.empty();

        QUESTION.makeQuestion(Quiz.Questions[Quiz.current]);

        CONTROLS.$answersInputs().click(CONTROLS.checkAnswer);

        CONTROLS.setDisabledButton(CONTROLS.$prevButton, false);
        CONTROLS.setDisabledButton(CONTROLS.$nextButton, false);
        CONTROLS.$nextButton.show();
        CONTROLS.$submitButton.hide();

        if (Quiz.current <= 0) {
            CONTROLS.setDisabledButton(CONTROLS.$prevButton, true);
            //CONTROLS.setDisabledButton(CONTROLS.$nextButton, false);
            //return;
        }

        if (Quiz.current >= Quiz.Questions.length - 1) {
            CONTROLS.setDisabledButton(CONTROLS.$nextButton, true);
            CONTROLS.$nextButton.hide();
            CONTROLS.$submitButton.show();
            //CONTROLS.setDisabledButton(CONTROLS.$prevButton, false);
            //return;
        }

        CONTROLS.enableNextButton();

    },
};

var ANSWERS = {
    
    makeHtml : function (answerId, answerText, checked) {
        var checked = checked ? ' checked' : '';
        var html = '<div class="form-group">'  +
                 '<div class="col-sm-offset-2 col-sm-10">' +
                    '<div class="radio">' +
                        '<h3><input id="' + answerId + '" type="radio" name="optionsRadios" value="' + answerText + '"' + checked + '><label for="' + answerId + '">' + answerText + '</label></h3>' +
                    '</div>' +
                '</div>' +
            '</div>';

        return html;
    }
};

function getQuestions() {
    var url = Quiz.QUESTION_URL;

    $.get(url, {

    })
    .done(AJAX.doneCallback);
}
var question = {};

//alert('dfd');


getQuestions();
