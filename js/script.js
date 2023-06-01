// Buttons
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
    //else {
        //const lastNode = document.getElementById('swapswitcher');
        //const lastClone = lastNode.cloneNode(true);
        //removeAllChildNodes(placeholder);
        //placeholder.appendChild(lastClone);
    //}  
});

