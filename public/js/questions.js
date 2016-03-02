/**
 * Created by sasik on 3/1/16.
 */

var Quiz = {
    QUESTION_URL: '/question/all',
    Questions: [],
    current: 1,
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

    QuestionTextId: "#question-text",
    AnswersContainerId: "#answers-container",

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

        console.log(step);
        console.log(currProgress);
        this.setProgress(currProgress + step);
    },

    stepBackward: function () {
        var step = this.getStep(),
            currProgress = this.getProgress();

        this.setProgress(currProgress - step);
    },

    setCurrentQuestionNumber : function (currQuestionNumber) {
        this.$questionCurrentNumber.text(currQuestionNumber);
    }
};


var CONTROLS = {

    $prevButton : $(HTML.PrevQuestionButtonId),

    $nextButton : $(HTML.NextQuestionButtonId),

    render : function () {

        return 0;
    },

    nextQuestion : function () {

        ProgressBar.stepForward();
        Quiz.current++;

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
        if (val) {
            $button.addClass('disabled');
        } else {
            $button.removeClass('disabled');
        }

    }

};

CONTROLS.$prevButton.click(CONTROLS.prevQuestion);
CONTROLS.$nextButton.click(CONTROLS.nextQuestion);

var QUESTION = {

    $questionText : $(HTML.QuestionTextId),

    $answersContainer : $(HTML.AnswersContainerId),

    makeQuestion : function (question) {
        this.$questionText.text(question.question);

        for (answerId in question.answers) {
            this.$answersContainer.append(ANSWERS.makeHtml(answerId, question.answers[answerId]));
        }
    },

    render : function () {
        this.$answersContainer.empty();


        QUESTION.makeQuestion(Quiz.Questions[Quiz.current - 1]);

        CONTROLS.setDisabledButton(CONTROLS.$prevButton, false);
        CONTROLS.setDisabledButton(CONTROLS.$nextButton, false);

        if (Quiz.current <= 1) {
            CONTROLS.setDisabledButton(CONTROLS.$prevButton, true);
            //CONTROLS.setDisabledButton(CONTROLS.$nextButton, false);
            return;
        }

        if (Quiz.current >= Quiz.Questions.length) {
            CONTROLS.setDisabledButton(CONTROLS.$nextButton, true);
            //CONTROLS.setDisabledButton(CONTROLS.$prevButton, false);
            return;
        }

    },
};

var ANSWERS = {
    
    makeHtml : function (answerId, answerText) {
        var html = '<div class="form-group">'  +
                 '<div class="col-sm-offset-2 col-sm-10">' +
                    '<div class="radio">' +
                        '<h3><input id="id_' + answerId + '" type="radio" name="optionsRadios" value="option1" checked><label for="id_' + answerId + '">' + answerText + '</label></h3>' +
                    '</div>' +
                '</div>' +
            '</div>';

        return html;
    }
}

function getQuestions() {
    var url = Quiz.QUESTION_URL;

    $.get(url, {

    })
    .done(AJAX.doneCallback);
}
var question = {};

//alert('dfd');


getQuestions();
