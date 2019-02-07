$( document ).ready(function() {

    // for performance when click edit redirect with out request if the data does not modified at all
    // for post
    let oldTitle=$("#title").val();
    let oldContent=$("#content").val();


    $("#submit-btn").on("click",function(e){
        e.preventDefault();
        // inputs
        let title=$("#title");
        let titleFeedback=$("#title-feedback");
        let content=$("#content");
        let contentFeedback=$("#content-feedback");


        // for performance
        if(title.val()===oldTitle&&oldContent===content.val()&&(document.URL.indexOf("edit") != -1))
        {
            // alert("no change happened");
            window.location.assign("/posts");

            return false;
        }

        // validate title
        // title is required
        let titleValue=title.val().trim();//remove spaces
        if(!titleValue)
        {
            title.addClass("has-error");
            titleFeedback.text("Title is required");
            titleFeedback.addClass("danger");
            return false;
        }
        let charactersInTitle=titleValue.length;
        // title is min 3
        if(charactersInTitle<3)
        {
            title.addClass("has-error");
            titleFeedback.text("Title must be 3 characters at least");
            titleFeedback.addClass("danger");
            return false;
        }
        // title is max 70
        if(charactersInTitle>70)
        {
            title.addClass("has-error");
            titleFeedback.text("Title must be 70 characters at most");
            titleFeedback.addClass("danger");
            return false;
        }
        titleFeedback.removeClass("danger").addClass("success");
        title.removeClass("has-error").addClass("has-no-error");
        titleFeedback.text("Title is good");


        // content
        let contentValue=content.val().trim();//remove spaces
        if(!contentValue)
        {
            content.addClass("has-error");
            contentFeedback.text("Content is required");
            contentFeedback.addClass("danger");
            return false;
        }
        let charactersInContent=contentValue.length;
        // content is min 100
        if(charactersInContent<100)
        {
            content.addClass("has-error");
            contentFeedback.text("Content must be 100 characters at least");
            contentFeedback.addClass("danger");
            return false;
        }
        contentFeedback.removeClass("danger").addClass("success");
        content.removeClass("has-error").addClass("has-no-error");

        contentFeedback.text("Content is good");

//console.log("helal");return false;
        $("#post-form").submit();

    });

});


