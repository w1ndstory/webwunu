function submitDateForm(event) {
    event.preventDefault();
    let date = document.getElementById('date').value;
    fetch(`{{ route('analyzeByDate') }}?date=${date}`, {
        method: "GET"
    })
    .then(response => response.json()) 
    .then(data => {
        document.getElementById('dateResult').innerHTML = JSON.stringify(data);
    });
}

function submitIPForm(event) {
    event.preventDefault();
    let ip = document.getElementById('ip').value;
    fetch(`{{ route('analyzeByIP') }}?ip=${ip}`, {
        method: "GET"
    })
    .then(response => response.json()) 
    .then(data => {
        document.getElementById('ipResult').innerHTML = JSON.stringify(data);
    });
}

function submitErrorTypeForm(event) {
    event.preventDefault();
    let errorType = document.getElementById('errorType').value;
    fetch(`{{ route('analyzeByErrorType') }}?errorType=${errorType}`, {
        method: "GET"
    })
    .then(response => response.json()) 
    .then(data => {
        document.getElementById('errorTypeResult').innerHTML = JSON.stringify(data);
    });
}

function submitCountryForm() {
    let formData = new FormData(document.getElementById('countryForm'));
    fetch("{{ route('createCountry') }}", {
        method: "POST",
        body: formData
    })
    .then(response => response.json()) 
    .then(data => {
        document.getElementById('countryResult').innerHTML = data.message;
    });
}
function submitForm() {
    let formData = new FormData(document.getElementById('userForm'));
    fetch("{{ route('createUser') }}", {
        method: "POST",
        body: formData
    })
    .then(response => response.json()) 
    .then(data => {
        document.getElementById('userResult').innerHTML = data.message;
    });
}
function submitCalcForm(event) {
    event.preventDefault();
    let operation = document.getElementById('operation').value;
    let a = document.getElementById('a').value;
    let b = document.getElementById('b').value;
    fetch(`{{ route('calculate') }}?operation=${operation}&a=${a}&b=${b}`, {
        method: "GET"
    })
    .then(response => response.json()) 
    .then(data => {
        document.getElementById('calcResult').innerHTML = data.message;
    });
}