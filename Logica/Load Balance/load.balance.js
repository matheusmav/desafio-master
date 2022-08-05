let fs = require("fs");

const readFileLines = (filename) =>
    fs.readFileSync(filename).toString("UTF8").split("\r\n");

const array = readFileLines("input.txt");

const ttask = parseInt(array.shift());
const umax = parseInt(array.shift());
const vms = [];
let ticks = 0;

function checkParams(ttask, umax) {
    if (ttask < 1 || ttask > 10) {
        console.log("Error: ttask must be between 1 and 10");
        return false;
    }
    if (umax < 1 || umax > 10) {
        console.log("Error: umax must be between 1 and 10");
        return false;
    }
    return true;
}

function makeTasks(users) {
    const ttaskUsers = [];
    for (let index = 0; index < users; index++) {
        ttaskUsers.push({ ticksRestantes: ttask });
    }
    return ttaskUsers;
}

function alocarTtask(ttaskUsers) {
    while (ttaskUsers.length > 0) {
        const vm = vms.find((vm) => vm.length < umax);
        if (vm) {
            vm.push(ttaskUsers.shift());
        } else {
            vms.push([ttaskUsers.shift()]);
        }
    }
}

function run() {
    //Checa as condicoes
    if (!checkParams(ttask, umax)) {
        return;
    }

    for (let index = 0; index < array.length + ttask; index++) {
        const element = array[index];

        const ttaskUsers = makeTasks(element);
        alocarTtask(ttaskUsers);

        //Atualiza tiks (Função com bug)
        vms.map((vm) => {
            vm.map((ttask) => {
                if (ttask.ticksRestantes > 0) {
                    ttask.ticksRestantes--;
                } else {
                    vm.splice(vm.indexOf(ttask), 1);
                }
                if (vm.length <= 0) {
                    vms.splice(vms.indexOf(vm), 1);
                }
            });
        });

        console.log(
            index,
            element,
            vms.map((vm) => vm.length)
        );

        //Verifica a quantidades de ticks que serão cobrados
        if (vms.length >= 1) {
            ticks += vms.length;
        }
    }

    console.log("Total de custo R$" + ticks);
}

run();
