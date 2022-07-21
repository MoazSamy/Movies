function validate()
{
    var slug = document.getElementById("slug").value;
    var name= document.getElementById("name").value;
    var description=document.getElementById("description").value;

    //validation for name input
    if (name.length < 1 || name.length > 255){
        event.preventDefault();
        document.getElementById("name-error").style.display="block";
    }
    else{
        document.getElementById("name-error").style.display="none";
    }

    //validation for slug input
    if (slug.length < 1 || slug.length > 255){
        event.preventDefault();
        document.getElementById("slug-error").style.display="block";
    }
    else{
        document.getElementById("slug-error").style.display="none";
    }

    //validation for rating input
    if(isRatingValid()){
        event.preventDefault();
        document.getElementById("rating-error").style.display="block";
    }
    else{
        document.getElementById("rating-error").style.display="none";
    }

    //validation for description input
    if (description.length < 30){
        event.preventDefault();
        document.getElementById("description-short-error").style.display="block";
        document.getElementById("description-long-error").style.display="none";
    }
    else if (description.length > 21844){
        event.preventDefault();
        document.getElementById("description-short-error").style.display="none";
        document.getElementById("description-long-error").style.display="block";
    }
    else{
        document.getElementById("description-short-error").style.display="none";
        document.getElementById("description-long-error").style.display="none";
    }

    //function to validate rating input from 0 to 5 only
    function isRatingValid()
    {
        var rating = document.getElementById("rating").value;
        var ratingExpr = /[^0-5]/g;
        if(rating.length == 1){
            if(rating.match(ratingExpr)){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return true;
        }
    }
}