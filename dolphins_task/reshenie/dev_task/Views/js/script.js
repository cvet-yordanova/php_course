
function updateCount(el, direction) {

    console.log('clicked');

    const CHILD_PRICE = 11.90;
    const ADULT_PRICE = 17.00;
    const ALLOW_PHOTO = 5.00;

    let adultCount = 0;
    let childrenCount = 0;
    let allowedPhotoCount = 0;

    let totalPriceHolder = document.getElementById('total_price')

    let element = document.getElementById(el);
    let currentVal = Number(element.value);

    if (direction == 'up') {
        element.value = currentVal + 1;
        updateFieldValues();
        udpatePrice();
    } else if (direction == 'down') {
        element.value = Math.max((currentVal - 1), 0);
        updateFieldValues();
        udpatePrice();
    }

    if (element.getAttribute('id') == "allow_photo" && direction == 'up') {
        element.value = Math.min(currentVal + 1, adultCount + childrenCount);
        updateFieldValues();
        udpatePrice();
    }

    function udpatePrice() {
        let total_price = CHILD_PRICE * (childrenCount) + ADULT_PRICE * adultCount + ALLOW_PHOTO * allowedPhotoCount;

        totalPriceHolder.value = (total_price + 'лв.')
    }

    function updateFieldValues() {
        adultCount = Number(document.getElementById('adult_count').value);
        childrenCount = Number(document.getElementById('children_count').value);
        allowedPhotoCount = Number(document.getElementById('allow_photo').value);
    }
}

function validate(ev) {
    
    let username = document.getElementById('names');
    let email = document.getElementById('email');
    let dateVisit = document.getElementById('datepicker');
    let timeVisit = document.getElementById('time_input');
    let countAdults = document.getElementById('adult_count');
    let countChildren = document.getElementById('children_count');
    let checkedAgree = document.getElementById('terms').getAttribute('checked') == 'true';
    console.log(document.getElementById('terms'));

    let inputTextValid = [];
    inputTextValid.push(username);
    inputTextValid.push(email);
    inputTextValid.push(dateVisit);
    inputTextValid.push(timeVisit);

    if(username.value == '') {
        ev.preventDefault();
        username.style.background = 'rgba(240, 80, 80, 0.521)';
    }

    for( let i= 0; i < inputTextValid.length; i++) {
        if(inputTextValid[i].value == '') {
            ev.preventDefault();
            inputTextValid[i].style.background = 'rgba(240, 80, 80, 0.521)';
        } else {
            inputTextValid[i].style.background = 'transparent';
        }
    }

    if(countAdults.value == '0' && countChildren.value == '0') {
        ev.preventDefault();
        countAdults.style.color = 'rgba(240, 80, 80, 0.521)';
        countChildren.style.color = 'rgba(240, 80, 80, 0.521)';
    } else {
        countAdults.style.color = '#fff';
        countChildren.style.color = '#fff';
    }

    if(!checkedAgree) {
        ev.preventDefault();
        document.getElementById('circle').style.borderColor = 'rgba(240, 80, 80, 0.521)';
    } else {
        document.getElementById('circle').style.borderColor = '#fff'; 
    }

}

document.getElementById('datepicker').addEventListener('blur', () => {
    let req = new XMLHttpRequest();
    req.onreadystatechange = function () {

        let result = req.responseText;
        result = result.replace(/["[\],]/g, ' ').split(/[ ]/g).filter(a => a !== '');

        let listTimes = document.createElement('ul');

        for (let i = 0; i < result.length; i++) {
            
            let liNode = document.createElement('li');
        
            liNode.innerText = result[i];
            liNode.addEventListener('click', (ev) => {
                document.getElementById('time_input').value = ev.target.innerText;
                document.getElementById('times').style.display = 'none';
            })
            listTimes.appendChild(liNode);
        }

        document.getElementById('times').innerHTML = '';
        document.getElementById('times').appendChild(listTimes);    

    }

    req.open("GET", "../get_shows.php", true);
    req.send();
});


function toggleCheck(element) {
    if (element.getAttribute("checked") == "true") {
        element.setAttribute("checked", "false");
        element.classList.remove("checked");
    } else {
        element.setAttribute("checked", "true");
        element.classList.add("checked");
    }
}

(function addListeners() {
    document.getElementById('time_input').addEventListener('focus', () => {
        document.getElementById('times').style.display = 'block';
    })
})()



