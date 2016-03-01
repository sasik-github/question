/**
 * Created by sasik on 3/1/16.
 */

var Quiz = {
    QUESTION_URL: '/question/all',
    Questions: [],
};

var AJAX = {
    doneCallback: function(resp) {
        console.log(resp);

        Quiz.Questions = resp;

        ProgressBar.setTotalCount(Quiz.Questions.length)
    }
};

var HTML = {
    ProgressBarId : '#progress-bar',
    ProgressBarLabelId : '#progress-bar-label',
    QuestionTotalCountId: '#question-count',
    QuestionCurrentNumberId: '#question-current-number',

    NextQuestionButtonId: '#next-question-btn',
    PrevQuestionButtonId: '#prev-question-btn',

};

var ProgressBar = {
    progress : 0,
    $progressBar : $(HTML.ProgressBarId),
    $questionTotalCount : $(HTML.QuestionTotalCountId),

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
};

var CONTROLS = {
    nextQuestion : function () {
        ProgressBar.stepForward();
    },

    prevQuestion : function () {
        ProgressBar.stepBackward();
    },
};



$(HTML.PrevQuestionButtonId).click(CONTROLS.prevQuestion);
$(HTML.NextQuestionButtonId).click(CONTROLS.nextQuestion);

function getQuestions() {
    var url = Quiz.QUESTION_URL;

    $.get(url, {

    })
    .done(AJAX.doneCallback);
}
var question = {};

//alert('dfd');


getQuestions();