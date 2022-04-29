let btn = document.querySelector("#collap");
let sidebar = document.querySelector(".sidebar");
btn.onclick = function () {
    sidebar.classList.toggle("active-aside");
}

let form = document.getElementById('form_courseImg');
let formDeleteCourse= document.getElementById('delete_course_form');
let formSearchCourse =document.getElementById('form_search_course');
let formUserImage=document.getElementById('form_userImg');
function  submitEditPhotoUser()
{
    formUserImage.submit();
}
function submitDelete() {
    formDeleteCourse.submit();
}
function submitSearchCourseForm()
{
    formSearchCourse.submit();
}

function submitForm()
{

       form.submit();

}
var i=1;
function newrow() {
    
document.getElementById("qid").innerHTML += " <section class='add_question' ><div class='row d-flex align-items-center'><div class='col-lg-4 question'><label>Q"+ ++i +"</label><br><input type='text' name='question[]'></div><div class='col-lg-6 choices d-flex align-items-center'><div class='dropdown  w-100 '><button class='btn btn-secondary dropdown-toggle w-100' type='button'id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>Choices</button><ul class='dropdown-menu w-100  ' aria-labelledby='dropdownMenuButton1'><li><input type='text' placeholder='  Enter Choice 1' name='choose1[]'></li><li><input type='text' placeholder='  Enter Choice 2' name='choose2[]'></li><li><input type='text' placeholder='  Enter Choice 3 (optional)' name='choose3[]'></li><li><input type='text' placeholder='  Enter Choice 4 (optional)' name='choose4[]'> </li> <li><input type='text' placeholder='  Enter Choice 5 (optional)' name='choose5[]'></li></ul></div></div><div class='col-lg-2 align-items-center answer'><label>Answer</label><br> <select name='answer[]'> <option>choice 1</option> <option>choice 2</option><option>choice 3</option><option>choice 4</option><option>choice 5</option></select></div></div></section>";

}

