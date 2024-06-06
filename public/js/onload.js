let rarity;
let type;
let itemList;
let monsterList;
let team;
let capture;
let inventory;

window.onload = async function () {
    itemList = await $.ajax({ url: "/api/getAllItems", type: "GET" });
    monsterList = await $.ajax({ url: "/api/getAllMonsters", type: "GET" });
    rarity = await $.ajax({ url: "/api/getAllRarity", type: "GET" });
    type = await $.ajax({ url: "/api/getAllTypes", type: "GET" });
    capture = await $.ajax({ url: "/api/getPlayerMonsters", type: "GET" });
    team = await $.ajax({ url: "/api/getPlayerTeams", type: "GET" });
    inventory = await $.ajax({ url: "/api/getPlayerItems", type: "GET" });
    console.log("Data loaded");
    
    markedDiscovered();
}

function getItemList() {
    return itemList;
}
function getRarities() {
    return rarity;
}
function getMonsterList() {
    return monsterList;
}
function getCapture() {
    return capture;
}
function getTeam() {
    return team;
}
function getTypes() {
    return type;
}
function getInventory() {
    return inventory;
}