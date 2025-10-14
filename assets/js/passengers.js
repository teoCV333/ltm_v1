const passengersTxt = document.getElementById('passengersTxt').value;
const passengersArray = passengersTxt
    .replace(/\[|\]|/g, '')
    .split(',')
    .map(Number);
const passengers = [];
let amountPassengers = 0;

// Calculamos la cantidad de pasajeros
for (var i=0; i<passengersArray.length; i++){
    for (var o=0; o<passengersArray[i]; o++){
        if(i == 0){ 
            passengers.push(`Adulto ${o > 0 ? o+1 : ''}`);
        }else if(i == 1){
            passengers.push(`Niño ${o > 0 ? o+1 : ''}`);
        }else{
            passengers.push(`Bebe ${o > 0 ? o+1 : ''}`);
        }
        amountPassengers++;
    }
}

function renderFormsPassengers(){
    // Impromimos el valor actual
    let currentPrice = document.getElementById('currentPrice').value;
    currentPrice = parseInt(currentPrice);

    const formattedPrice = currentPrice.toLocaleString();
    document.getElementById('totalToPay').textContent = formattedPrice;

    const formContent = document.querySelector('.form .form__content');
    formContent.innerHTML = "";

    for (var i=0; i<amountPassengers; i++){
        let result = false;

        if(i === 0 && amountPassengers > 1){
            result = true;
        }

        const formElement = document.createElement('div');
        formElement.classList.add('form__element');
        result ? formElement.classList.add('active') : "";


        const content = `
            <div onclick="openElement(event)" class="form__top">
                <div class="form__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="18px" viewBox="0 0 32 32" fill="none" focusable="false"><path d="M14.0075 2.40103C12.7448 2.40103 11.6507 2.85248 10.7435 3.76441C9.83625 4.67635 9.38712 5.76667 9.38712 7.04526C9.38712 8.32385 9.83625 9.41463 10.7435 10.3266C11.6507 11.2385 12.7354 11.6895 14.0075 11.6895C15.2795 11.6895 16.3646 11.2385 17.2719 10.3266C18.1791 9.41463 18.6283 8.32385 18.6283 7.04526C18.6283 5.77607 18.1791 4.67635 17.2719 3.76441C16.3646 2.86188 15.2795 2.40103 14.0075 2.40103ZM14.0075 13.1093C12.352 13.1093 10.9305 12.5169 9.75202 11.3324C8.57354 10.1478 7.98417 8.72835 7.98417 7.0549C7.98417 5.38145 8.57354 3.96157 9.75202 2.77699C10.9305 1.59242 12.352 1 14.0075 1C15.1205 1 16.1493 1.29183 17.0846 1.86531C18.0199 2.4388 18.7498 3.18116 19.2548 4.0931C19.7692 5.00503 20.0216 5.99254 20.0216 7.0549C20.0216 8.18307 19.7317 9.2074 19.1612 10.1475C18.5907 11.0877 17.8517 11.8211 16.9444 12.3381C16.0465 12.8458 15.0644 13.1093 14.0075 13.1093ZM4.68275 31C4.50504 31 4.34581 30.9344 4.20551 30.7934C4.06522 30.6524 4 30.4831 4 30.2669V20.5644C4 20.2635 4.14963 20.0379 4.44893 19.8781L24.062 12.7706C25.1843 12.3475 26.1196 12.3758 26.8679 12.8647C27.6255 13.3817 28 14.1812 28 15.2811V30.2104C28 30.3891 27.9343 30.5487 27.794 30.6897C27.6631 30.8307 27.4853 30.8967 27.2702 30.8967C27.0644 30.8967 26.8963 30.8307 26.7747 30.6897C26.6531 30.5487 26.5875 30.3985 26.5875 30.2104V15.2811C26.5875 14.7076 26.4287 14.2939 26.0919 14.0495C25.7272 13.805 25.2124 13.8237 24.5483 14.0963L5.38423 21.0629V30.2573C5.38423 30.4735 5.31856 30.6428 5.17826 30.7838C5.06603 30.9342 4.88852 31 4.68275 31Z" fill="currentColor"></path></svg>
                </div>

                <span class="form__passenger">${passengers[i]}</span>

                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="rgb(232, 17, 75)" stroke="rgb(232, 17, 75)" class="form__float-icon bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                </svg>
            </div>

            <div class="form__bot">
                <div class="form__content-input">
                    <input class="form__input" type="text" required>
                    <span class="form__lbl">Nombre</span>
                </div>

                <div class="form__content-input">
                    <input class="form__input" type="text" required>
                    <span class="form__lbl">Apellido</span>
                </div>

                <div class="form__content-input">
                    <input class="form__input" type="date" required>
                    <span class="form__lbl form__lbl-none">Fecha de nacimiento *</span>
                </div>

                <div class="form__content-input">
                    <select class="form__input" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>

                    <span class="form__lbl form__lbl-none">Género</span>
                </div>

                <div class="form__content-input">
                    <select class="form__input" required>
                        <option value="CI">Cédula de Identidad</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>

                    <span class="form__lbl form__lbl-none">Tipo de documento</span>
                </div>

                <div class="form__content-input">
                    <input class="form__input" type="text" required>
                    <span class="form__lbl">Número de documento</span>
                    <span class="form__alert">Sin puntos ni guión</span>
                </div>

                <div class="form__ttl">Información de contacto</div>

                <div class="form__content-input">
                    <input id="inputEmail${i}" class="form__input" type="text" required>
                    <span class="form__lbl">Email</span>
                </div>

                <div class="form__content-input">
                    <input id="inputNumber${i}" class="form__input" type="text" required>
                    <span class="form__lbl">Número de Telefono</span>
                </div>

                ${result ? `
                    <div class="form__checkbox">
                        <label for="checkboxData" class="cbx">
                            <div class="checkmark">
                                <input type="checkbox" id="checkboxData">
                                <div class="flip">
                                    <div class="front"></div>
                                    <div class="back">
                                        <svg viewBox="0 0 16 14" height="14" width="16">
                                            <path d="M2 8.5L6 12.5L14 1.5"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <span class="cbx__txt">Repetir información de contacto para el resto de pasajeros.</span>
                        </label>
                    </div>
                ` : ''}

            </div>
        `;

        formElement.innerHTML += content;
        formContent.appendChild(formElement);
    }
}

renderFormsPassengers();

function openElement(event) {
    const element = event.target;
    const parentElement = element.parentNode;
    const elements = document.querySelectorAll('.form__element');
    const amountElements = elements.length;

    // Si el elemento no tiene la clase 'active', la agregamos
    if (parentElement.classList.contains('active')) {
        parentElement.classList.remove('active');
        return;
    }

    // Remover la clase 'active' de todos los elementos
    for (var i = 0; i < amountElements; i++) {
        elements[i].classList.remove('active');
    }

    parentElement.classList.add('active');
}

function confirmData(event){
    const element = event.target;
    const checkbox = document.getElementById('checkboxData');

    if(checkbox.checked){
        const inputEmailFirst = document.getElementById('inputEmail0');
        const inputNumberFirst = document.getElementById('inputNumber0');

        for (var i=0; i<amountPassengers; i++){
            if (i >= 1){
                const inputEmail = document.getElementById(`inputEmail${i}`);
                const inputNumber = document.getElementById(`inputNumber${i}`);

                inputEmail.value = inputEmailFirst.value;
                inputNumber.value = inputNumberFirst.value;
            }
        }
    }

    // Buscamos al abuelo (.form__element) del elemento recibido para hacer que se colapse
    element.parentNode.parentNode.classList.remove('active');
}