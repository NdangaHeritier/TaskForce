// Dashboard links menu toggler

var menuButton = document.querySelector(".menu-button");
const menuIcon = document.querySelectorAll(".item-icon");
const menuText = document.querySelectorAll(".item-text");

menuButton.addEventListener('click', ()=>{
    menuText.forEach(item => {
        item.classList.toggle("collapse");
    })
});

// Accounts models scripts..

const accountModel = document.querySelector(".add-account-form-container");
const showModelBtns = document.querySelectorAll(".add-account");
const cancelModelBtns = document.querySelectorAll(".cancel-model");


showModelBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        accountModel.style.display='flex';
    })
})

cancelModelBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        accountModel.style.display='none';
    })
})

// Recharge form...

const rechargeBtn = document.querySelectorAll(".recharge-button");
const rechargeForm = document.querySelectorAll(".recharge-form");
const rechargeClose = document.querySelectorAll(".close-form");

rechargeBtn.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        rechargeForm[index].style.display='flex';
    });
});
    
rechargeClose.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        rechargeForm[index].style.display='none';
    });
});


// Expenses forms and models scripts..

const categoryModel = document.querySelector(".add-category-form-container");
const showCategoryModelBtns = document.querySelectorAll(".add-category-btn");
const cancelCategoryModelBtns = document.querySelectorAll(".cancel-category-model");


showCategoryModelBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        categoryModel.style.display='flex';
    })
})

cancelCategoryModelBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        categoryModel.style.display='none';
    })
})

const subCategoryModel = document.querySelectorAll(".add-sub-form-container");
const showSubModelBtns = document.querySelectorAll(".add-sub-button");
const cancelSubModelBtns = document.querySelectorAll(".cancel-sub-model");


showSubModelBtns.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        subCategoryModel[index].style.display='flex';
    })
})

cancelSubModelBtns.forEach((btn, index) => {
    btn.addEventListener("click", () => {
        subCategoryModel[index].style.display='none';
    })
})


// transactions scripts..

const tabItems= document.querySelectorAll('.account-btn');
const tabBody= document.querySelectorAll('.transaction-body');

tabItems[0].classList.toggle("active");
tabBody[0].classList.toggle("active");

tabItems.forEach((item, index) => {
    item.addEventListener("click", ()=>{
        tabItems.forEach(item => {
            item.classList.remove("active");
        });

        tabBody.forEach(item => {
            item.classList.remove("active");
        });
        item.classList.add("active");
        tabBody[index].classList.add("active");
    });
});


// spending money step 1


function activate (id) {
    let cards= document.querySelectorAll(".account");
    cards.forEach(card => {
        card.classList.remove("active");
    })
    document.querySelector(`#${id}`).classList.add('active');
}

// show and toogle tabs on report

function show(Rsection){
    document.querySelectorAll('.report-body').forEach(section => {
        section.classList.remove('active')
    });
    document.querySelectorAll('.report-btn').forEach(section => {
        section.classList.remove('active')
    });
    document.querySelector('.'+Rsection).classList.add('active');
    document.getElementById(Rsection+'-btn').classList.add('active');
}
