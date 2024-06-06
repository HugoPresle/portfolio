


function createItemCard(div, item, inventory) {
    const itemDiv = document.createElement("div");
    itemDiv.classList.add("card", "my-3", "mx-3", "p-3", "bg-white", "rounded-lg", "shadow-md", "flex", "flex-col", "items-center", "justify-center");
    itemDiv.id = item.item_id;

    const cardDiv = document.createElement("div");
    cardDiv.classList.add("flex", "flex-col", "items-center", "justify-center", "w-full", "max-w-sm", "mx-auto", "m-3");

    const img = document.createElement("img");
    img.src = "img/img.png" //TODO: Change this to the actual image
    img.classList.add("w-32", "h-32", "object-cover", "object-center", "rounded-full");
    cardDiv.appendChild(img);

    const h2 = document.createElement("h2");
    h2.classList.add("text-lg", "text-gray-900", "font-medium", "title-font", "my-4");
    h2.textContent = item.name;
    cardDiv.appendChild(h2);

    const h3 = document.createElement("h3");
    h3.classList.add("text-gray-500", "text-sm", "mb-4");
    h3.textContent = inventory.quantity;
    cardDiv.appendChild(h3);

    itemDiv.appendChild(cardDiv);

    div.appendChild(itemDiv);
}

function removeitemCard(id) {
    const div = document.getElementById(id);
    div.remove();
}


function buyItem(id, qty, currency) {
    const div = document.getElementById("myItems");

    $.ajax({
        url: `/api/buyItem/${id}/${qty}/${currency}`,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (data) {
            console.log(getInventory());
            if (data.success) {
                if (div.contains(document.getElementById(id))) {
                    removeitemCard(id);
                    createItemCard(div, getItemList().find(item => item.item_id === id), getInventory().find(item => item.item_id === id));
                }
                else {
                    createItemCard(div, getItemList().find(item => item.item_id === id), getInventory().find(item => item.item_id === id));
                }
                addAlert("success", "🎉 Achat réussi 🎉", "Félicitations, vous avez acheté <span><strong>" + getItemList().find(item => item.item_id === id).name + "</strong></span>", "", "OK", function () { return removeAlert(); });

            } else {
                if (data.error === "notEnoughMoney") {
                    addAlert("alert", "❌ Pas assez d'argent ❌", "Vous n'avez pas assez d'argent pour acheter cet item", "", "OK", function () { return removeAlert(); });
                }
                else if (data.error === "notEnoughGems") {
                    addAlert("alert", "❌ Pas assez de gemmes ❌", "Vous n'avez pas assez d'argent pour acheter cet item", "", "OK", function () { return removeAlert(); });
                }
                else if (data.error === "notEnoughSpace") {
                    addAlert("alert", "❌ Pas assez d'espace ❌", "Vous n'avez pas assez d'espace dans votre inventaire pour acheter cet item", "", "OK", function () { return removeAlert(); });
                }
            }
        },

        error: function (error) {
            console.log(error);
            addAlert("alert", "❌ Erreur ❌", "Une erreur s'est produite lors de l'achat", "", "Continuer", function () { return removeAlert(); });
        }
    });

}
function buyAlert(id, qty, currency) {
    let itemList = getItemList();
    let item = itemList.find(item => item.item_id === id);
    addAlert(
        "success",
        "Confirmation d'achat",
        "Voulez-vous vraiment acheter cet item?",
        "<span><strong>" + qty + "x " + item.name + "</strong></span> pour <span><strong>" + formatNumber(item.price * qty) + "</strong></span> <i class='fa-solid fa-coins fa-lg'></i>",
        "Acheter",
        function () { return buyItem(id, qty, currency); },
        "Annuler",
        function () { return removeAlert(); },
    );
}
function updatePrice(itemId, price) {
    let quantity = document.getElementById('quantity_' + itemId).value;
    let totalPrice = quantity * price;
    console.log(document.getElementById('price_' + itemId));
    document.getElementById('price_' + itemId).innerHTML = formatNumber(totalPrice);

}

function filterItems(btn) {
    document.getElementById('itemInput').value = "";
    let cat = btn.value;
    divs = document.querySelectorAll('#divCardItem div[id^="item_"]')
    let btns = document.querySelectorAll('#itemMenu button');
    btns.forEach(btnl => {
        btnl.classList.remove('selected');
    });
    divs.forEach(div => {
        if (cat === "all") {
            div.classList.remove('hidden');
        }
        else if (div.classList.contains("cat_" + cat)) {
            div.classList.remove('hidden');

            btn.classList.add('selected');
        } else {
            div.classList.add('hidden');
        }
    });
}
function searchItems(input) {
    let value = input.value.toLowerCase();
    let cat = "all";
    var menuItems = document.querySelectorAll('#itemMenu');
    menuItems.forEach(item => {
        let btns = item.querySelectorAll('button');
        btns.forEach(btn => {
            if (btn.classList.contains('selected')) {
                cat = btn.value;
                console.log(cat);
            }
        });
    });

    let divs = document.querySelectorAll('#divCardItem div[id^="item_"]');
    divs.forEach(div => {
        let name = div.querySelector('h3#itemName').textContent.toLowerCase();
        if (cat === "all") {
            if (name.includes(value)) {
                div.classList.remove('hidden');
            }
            else {
                div.classList.add('hidden');
            }
        }
        else if (div.classList.contains("cat_" + cat) && name.includes(value)) {
            div.classList.remove('hidden');
        } else {
            div.classList.add('hidden');
        }
    });
}