let add = document.querySelectorAll("#add");
let subtract = document.querySelectorAll("#subtract");
let quantity = document.querySelectorAll("#quantity");
let totalAmount = document.querySelector("#total");
let payStackAmount = document.querySelector('#amount');
let solePrice = document.querySelectorAll('#price');

let arrays = [];
function sumAmount(arrays){
    let x = 0;
    for(let y = 0; y < arrays.length; y++){
        x += arrays[y];
    }
    return x;
}

solePrice.forEach(function (values, index,array){
     arrays.push(values.innerHTML);
})
for (let a = 0 ; a < add.length; a++){
    let x = Number(quantity[a].innerHTML);
    add[a].addEventListener("click", function () {
        x += 1;
        quantity[a].innerHTML = x;
        let stringValue = parseFloat(arrays[a].replace(/,/g, ""));
        solePrice[a].innerHTML = (stringValue * x).toLocaleString('en-US')+'.00';

        // let amount = parseFloat(totalAmount.value.replace(/,/g,''));
        let newSolePrice = [];
        solePrice.forEach(function (values, index,array){
           newSolePrice.push(parseFloat(values.innerHTML.replace(/,/g,'')));
        })
        totalAmount.value = sumAmount(newSolePrice).toLocaleString('en-US')+'.00';
        payStackAmount.value = sumAmount(newSolePrice);
    });

    subtract[a].addEventListener("click", function () {
        if (quantity[a].innerHTML > 1) {
            x -= 1;
            quantity[a].innerHTML = x;
            let stringValue = parseFloat(arrays[a].replace(/,/g, ""));
            solePrice[a].innerHTML = (stringValue * x).toLocaleString('en-US')+'.00';

            let newSolePrice = [];
            solePrice.forEach(function (values, index,array){
                newSolePrice.push(parseFloat(values.innerHTML.replace(/,/g,'')));
            })
            totalAmount.value = sumAmount(newSolePrice).toLocaleString('en-US')+'.00';
            payStackAmount.value = sumAmount(newSolePrice);
        }

    });
}
