// Author: JULIAN BUENO

function checkType(newType)
{
    let petElements = document.querySelectorAll('.TYPE-PET');
    let foodElements = document.querySelectorAll('.TYPE-FOOD');
    if(newType.value == 'PET'){
        petElements[0].classList.remove('hidden');
        petElements[1].classList.remove('hidden');
        foodElements[0].classList.add('hidden');
        foodElements[1].classList.add('hidden');
    }
    else if(newType.value == 'FOOD'){
        petElements[0].classList.add('hidden');
        petElements[1].classList.add('hidden');
        foodElements[0].classList.remove('hidden');
        foodElements[1].classList.remove('hidden');
    }
}

