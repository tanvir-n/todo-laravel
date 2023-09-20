
class AddButton {
    constructor() {
        this.addButtonHtml = '<div class="col-1">\
                                <a href="/todos/create">\
                                    <button type="button" class="btn btn-light d-flex align-items-center">Add</button>\
                                </a>\
                            </div>';
    }
}

let addbutton = new AddButton();
document.getElementById('addbtn').innerHTML = addbutton.addButtonHtml;