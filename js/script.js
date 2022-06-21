// Buttons
const saveButton = document.getElementById('save-button');
const cancelButton = document.getElementById('cancel-button');

// Inputs fields
const sku = document.getElementById('sku');
const productName = document.getElementById('name');

// Numeric 
const price = document.getElementById('price');
const size = document.getElementById('size');
const height = document.getElementById('height');
const width = document.getElementById('width');
const length = document.getElementById('length');
const weight = document.getElementById('weight');

// Select
const productType = document.getElementById('productType');

// Form Switch
const space = document.getElementById('placeholder');

// Form
const form = document.getElementById('product-form')

function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}
const placeholder = document.querySelector('#placeholder');


productType.addEventListener('change', ($event) => {
    if ($event.target.value  == 'DVD') {
        const firstNode = document.getElementById('DVD');
        const firstClone = firstNode.cloneNode(true);
        removeAllChildNodes(placeholder);
        placeholder.appendChild(firstClone);
    }
    else if($event.target.value  == 'Furniture'){
        const secondNode = document.getElementById('Furniture');
        const secondClone = secondNode.cloneNode(true);
        removeAllChildNodes(placeholder);
        placeholder.appendChild(secondClone);
    }
    else if($event.target.value  == 'Book'){
        const thirdNode = document.getElementById('Book');
        const thirdClone = thirdNode.cloneNode(true);
        removeAllChildNodes(placeholder);
        placeholder.appendChild(thirdClone);
    }
    else {
        const lastNode = document.getElementById('swapswitcher');
        const lastClone = lastNode.cloneNode(true);
        removeAllChildNodes(placeholder);
        placeholder.appendChild(lastClone);
    }  
});

const checkAlphanumeric = () => {
    let valid = false;
    const skuvalue = sku.value.trim();

    if (!isRequired(skuvalue)) {
        showError(sku, 'Please submit required SKU data.');
    } else if (!isAlphanumeric(sku)) {
        showInvalid(sku, 'Please provide alphanumeric string data for the SKU field');
    } else {
        showSuccess(sku);
        valid = true;
    }
    return valid
}

const checkAlphabetic = () => {
    let valid = false;
    const nameValue = productName.value.trim();
    if (!isRequired(nameValue)) {
        showError(productName, 'Please, submit the required Name data.');
    } else if (isAlphabetic(nameValue)) {
        showInvalid(nameValue, 'Please, provide alphabetic string data for the Name field.');
    } else {
        showSuccess(nameValue);
        valid = true
    }
    return valid;
}

const checkNumeric1 = () => {
    let valid = false;
    const field1 = price.value.trim();
    if (!isRequired(field1)) {
        showError(price, 'Please, submit the required Price data.');
    } else if (!isNumeric(field1)) {
        showInvalid(price, 'Please, provide decimal number for the Price field.');
    } else {
        showSuccess(price);
        valid = true;
    }
    return valid;
}


const checkNumeric2 = () => {
    let valid = false;
    const field2 = size.value.trim();
    if (!isRequired(field2)) {
        showError1(size, 'Please, submit the required Size data.');
    } else if (!isNumeric(field2)) {
        showInvalid1(size, 'Please, provide decimal number for the Size field.');
    } else {
        showSuccess(size);
        valid = true;
    }
    return valid;
}


const checkNumeric3 = () => {
    let valid = false;
    const field3 = height.value.trim();
    if (!isRequired(field3)) {
        showError(height, 'Please, submit the required Height data.');
    } else if (!isNumeric(field3)) {
        showInvalid(height, 'Please, provide decimal number for the Height field.');
    } else {
        showSuccess(height);
        valid = true;
    }
    return valid;
}

const checkNumeric4 = () => {
    let valid = false;
    const field4 = width.value.trim();
    if (!isRequired(field4)) {
        showError(width, 'Please, submit the required Width data.');
    } else if (!isNumeric(field4)) {
        showInvalid(width, 'Please, provide decimal number for the Width field.');
    } else {
        showSuccess(width);
        valid = true;
    }
    return valid;
}

const checkNumeric5 = () => {
    let valid = false;
    const field5 = length.value.trim();
    if (!isRequired(field5)) {
        showError(length, 'Please, submit the required Length data.');
    } else if (!isNumeric(field5)) {
        showInvalid(length, 'Please, provide decimal number for the Length field.');
    } else {
        showSuccess(length);
        valid = true;
    }
    return valid;
}

const checkNumeric6 = () => {
    let valid = false;
    const field6 = weight.value.trim();
    if (!isRequired(field6)) {
        showError(weight, 'Please, submit the required Weight data.');
    } else if (!isNumeric(field6)) {
        showInvalid(weight, 'Please, provide decimal number for the Weight field.');
    } else {
        showSuccess(weight);
        valid = true;
    }
    return valid;
}

const isRequired = value => value === '' ? false : true;

const isAlphanumeric = (entry) => {
    const re = /^[A-Z0-9]+$/;
    return re.test(entry)
};

const isAlphabetic = (entry) => {
    const re = /^[a-zA-z]+([\s][a-zA-Z]+)*$/;
    return re.test(entry)
}

const isNumeric = (entry) => {
    const re = /^\d{1,10}(\.\d{1,4})?$/;
    return re.test(entry);
}

const showError = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

const showError1 = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;
    // show the error messagedocument.querySelector("fieldset");
    const error = formField.querySelector('span');
    error.innerHTML = message;
    //const error = document.getElementById('product-dim-error')
    //error.textContent = message;
};

const showInvalid = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;

    // show the error message
    const error = formField.querySelector('code');
    error.textContent = message;
};

const showInvalid1 = (input, message) => {
    // show the error message
    const error = document.getElementById('invalid-product-dim')
    error.textContent = message;
};


saveButton.addEventListener('click', function (e) {
    // prevent the form from submitting
    e.preventDefault();

    // validate fields
    let isSKUValid = checkAlphanumeric(),
        isNameValid = checkAlphabetic(),
        isPriceValid = checkNumeric1(),
        isSizeValid = checkNumeric2(),
        isHeightValid = checkNumeric3(),
        isWidthValid = checkNumeric4(),
        isLengthValid = checkNumeric5(),
        isWeightValid = checkNumeric6();
        
    let isFormValid = isSKUValid &&
        isNameValid &&
        isPriceValid &&
        isSizeValid &&
        isHeightValid &&
        isWidthValid &&
        isLengthValid &&
        isWeightValid;

    // submit to the server if the form is valid
    if (isFormValid) {

    }
    setTimeout(doReset, 9000);

    function doReset() {
        location.reload();
    }
});

//^[a-zA-z]+([\s][a-zA-Z]+)*$   /^[A-Z\d]+$/  /^[A-Z0-9]+$/; var patt = new RegExp(/^\d{1,10}(\.\d{1,4})?$/);

