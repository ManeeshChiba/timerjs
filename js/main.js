$( document ).ready(function() {

    var storyPointsID;
    var openCard = '<div class="card">';
    var openIssueCode = '<div class="issue-code">';
    var openSummaryCode = '<div class="summary">';
    var openEstimateCode = '<div class="estimate">';
    var openAssigneeCode = '<div class="assignee">';
    var closeCard = '</div>';
    var closeIssueCode = '</div>';
    var closeSummaryCode = '</div>';
    var closeEstimateCode = '</div>';
    var closeAssigneeCode = '</div>';

    $('#upload').change(function(){
    	$('#file-name').text($('#upload').prop("files")[0]['name']).addClass('file-added');
    });

    $('.how-to').click(function(e){
    	e.preventDefault();
    	$('#how-to').slideDown();
    });
    $('#close').click(function(e){
    	e.preventDefault();
    	$('#how-to').slideUp();
    });

    var arrQuips = ['...because you have better things to do', '...because its machine work', '...because there\'s an app for that', '...because why not', '...because time is precious', '...because designers solve problems', '...just becuase', '...because its painful making these in excel', '...because you can', '...because time = money'];

    var quip = arrQuips[ Math.floor(Math.random() * arrQuips.length) + 0 ];
    $('#because').text(quip);
    



    setTimeout(function(){
    	if ($('.raw-html-output').length > 0){

			 $('.dots-loader').remove();


    		$('#issuetable thead tr th').each(function(index){
		    	if ( $.trim($(this).text().toLowerCase()) == 'story points' ){
		    		storyPointsID =  $(this).attr('data-id');
		    	}
		    });

		    $('.issuerow').each(function(index){

		    	var card = 	openCard + 
		    				openIssueCode + 
		    				$.trim( $('.issue-link',this).text() ) + 
		    				closeIssueCode + 
		    				openSummaryCode +
		    				$.trim( $('.summary',this).text() ) +
		    				closeSummaryCode +
		    				openEstimateCode +
		    				$.trim( $('.'+storyPointsID,this).text() ) +
		    				closeEstimateCode +
		    				openAssigneeCode +
		    				$.trim( $('.assignee',this).text() ) +
		    				closeAssigneeCode +
		    				closeCard;

		    	if ( $('.card').length < 1 ){
		    		$(card).insertAfter('.raw-html-output');
		    	} else {
		    		$(card).insertAfter('.card:last-of-type');
		    	}
		    });

		    $('.summary').each(function(index){
		        textFit($(this), {multiLine: true, maxFontSize: 50 } );
		    });	
    	}
    	

    },2000);



$('input:file').change(function(){
    if ($(this).val()) {
        $('#submit-button').removeClass('disabled');
        $('#submit-button').addClass('green');
    } 
});

$('#submit-button').click(function(){
    $('#upload-animation').addClass('show');
});

if ( document.location.href.indexOf('#error') > -1 ) {
    $('.toast').slideDown();
}


    



});