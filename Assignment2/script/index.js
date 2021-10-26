function validateForm() {
    const re = /([-!#-'*+/-9=?A-Z^-~]+(\.[-!#-'*+/-9=?A-Z^-~]+)*|"([]!#-[^-~ \t]|(\\[\t -~]))+")@[0-9A-Za-z]([0-9A-Za-z-]{0,61}[0-9A-Za-z])?(\.[0-9A-Za-z]([0-9A-Za-z-]{0,61}[0-9A-Za-z])?)+/gi;
    let username = document.forms["login_form"]["username"].value;
    let password = document.forms["login_form"]["password"].value;
    if(username.length === 0 || password.length === 0) {
        alert("Нууц үг эсвэл и-мэйл хоосон байна");
        return false;
    }
    else if(re.test(username.trim()) === false){
        alert("Хэрэглэгчийн и-мэйл буруу форматтай байна");
        return false;
    }
}