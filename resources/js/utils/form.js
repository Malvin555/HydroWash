export function populateFormData(form, data) {
    const elements = form.querySelector("[name]");

    elements.forEach(element => {
        const name = element.name;
        const value = data[name];

        if (!value) return;

        switch (element.tagName) {
            case "INPUT":
                switch (element.type.toLowerCase()) {
                    case "file":
                        const imgPreview = form.querySelector(`img[name="${name.replace('File', '')}"]`);
                        if (imgPreview) {
                            imgPreview.src = value || '';
                        }
                        break;
                    case "checkbox":
                        element.checked = !!value;
                        break;
                    case "radio":
                        if (element.value === value) {
                            element.checked = true;
                        }
                        break;
                
                    default:
                        element.value = value;
                        break;
                }
                break;
            case "SELECT":
                const option = element.querySelector(`option[value="${value}"]`);
                if (option) {
                    option.selected = true;
                }
                break;
            case "TEXTAREA":
                element.value = value;
                break;
            case "IMG":
                element.src = value || '';
                break;
        
            default:
                console.warn("Unsupported element type:", element.tagName);
                break;
        }
    });
}

export function clearFormData(form) {
    const elements = form.querySelector("[name]");

    elements.forEach(element => {
        switch (element.tagName) {
            case "INPUT":
                switch (element.type.toLowerCase()) {
                    case "file":
                        element.value = '';
                        const imgPreview = form.querySelector(`img[name="${element.name.replace('File', '')}"]`);
                        if (imgPreview) {
                            imgPreview.src = '';
                        }
                        break;
                    case "checkbox":
                    case "radio":
                        element.checked = false;
                        break;
                
                    default:
                        element.value = '';
                        break;
                }
                break;
            case "SELECT":
                element.selectedIndex = 0;
                break;
            case "TEXTAREA":
                element.value = '';
                break;
            case "IMG":
                element.src = '';
                break;
        
            default:
                console.warn("Unsupported element type:", element.tagName);
                break;
        }
    });
}