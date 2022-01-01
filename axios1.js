const Getbtn = document.getElementById('get-btn');
const Postbtn = document.getElementById('post-btn');
function btn(){
    alert("get");
}


const url ="http://localhost/12.%20connect%20server/User.php";
const getData = () => {
axios.get(url).then(Response =>{
console.log(Response);
})
};
