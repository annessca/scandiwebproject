// Select
const productType = document.getElementById('productType');

const placeholder = document.querySelector('#blankplaceholder');
const sizmet = document.querySelector('#dvdswap');
const dimmet = document.querySelector('#ftrswap');
const wgtmet = document.querySelector('#bookswap');
document.addEventListener('DOMContentLoaded', function () {
    productType && productType.addEventListener('change', ($event) => {
        if ($event.target.value  === 'DVD') {
            wgtmet.classList.add("typeremove");
            dimmet.classList.add("typeremove");
            sizmet.classList.remove('typeremove');
            placeholder.classList.add("typeremove");
            
        }
        else if($event.target.value  === 'Furniture'){
            sizmet.classList.add('typeremove');
            wgtmet.classList.add("typeremove");
            dimmet.classList.remove("typeremove");
            placeholder.classList.add("typeremove");
        }
        else if($event.target.value  === 'Book'){
            sizmet.classList.add("typeremove");
            dimmet.classList.add("typeremove");
            //document.getElementById('size').setAttribute('value', 1.0);
            //document.getElementById('height').setAttribute('value', 1.0);
            //document.getElementById('width').setAttribute('value', 1.0);
            //document.getElementById('length').setAttribute('value', 1.0);
            wgtmet.classList.remove("typeremove");
            placeholder.classList.add("typeremove");
        }
    });
});

