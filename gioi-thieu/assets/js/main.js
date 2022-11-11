function customSelect(classStr, group) {
    let selectForm = document.querySelector(`.${classStr} > select`)
    if (selectForm) {
        let dropdownContent = document.querySelector(`.${classStr} > .dropdown-menu > .dropdown-content`)
        let btn = document.querySelector(`.${classStr} > button`)
        let btnContent = document.querySelector(`.${classStr} > button > .btn-desc`)

        if (group == false) {

            let optionItem = [...selectForm.children]
            let ulDropdow = dropdownContent.appendChild(document.createElement("ul"))
            optionItem.forEach((item) => {
                let liDropdown = ulDropdow.appendChild(document.createElement("li"))
                liDropdown.textContent = item.textContent
            })

            let ul = [...dropdownContent.children]
            ul.forEach((item) => {
                item.childNodes.forEach((li) => {
                    li.addEventListener("click", () => {
                        if (li.classList.value === "") {

                            ul.forEach((ul) => {
                                ul.childNodes.forEach((i) => {
                                    i.classList.remove("active")
                                })
                            })
                            li.classList.add("active")
                            btnContent.textContent = li.textContent
                            btn.classList.remove("active")
                            document.querySelector(`.${classStr} > .dropdown-menu`).classList.remove("active")
                            optionItem.forEach((item) => {
                                
                                if (item.textContent === btnContent.textContent)
                                    item.setAttribute("selected", true)
                                else item.removeAttribute("selected")
                            })
                        }
                    })
                })
            })
            optionItem.forEach((item)=>{
                if(item.hasAttribute("selected"))
                    {
                        btnContent.textContent = item.textContent;
                    }
            })
        }
        else {
            let groupOption = [...selectForm.children]
            groupOption.forEach((e) => {
                let ulDropdow = dropdownContent.appendChild(document.createElement("ul"))
                let liDropdown = ulDropdow.appendChild(document.createElement("li"))
                liDropdown.textContent = e.getAttribute("label")
                liDropdown.classList.add("dropdown-header")
                let optionItem = [...e.children]
                optionItem.forEach((item) => {
                    let liDropdown = ulDropdow.appendChild(document.createElement("li"))
                    liDropdown.textContent = item.textContent
                })
            })

            let ul = [...dropdownContent.children]
            ul.forEach((item) => {
                item.childNodes.forEach((li) => {
                    li.addEventListener("click", () => {
                        if (li.classList.value === "") {
                            ul.forEach((ul) => {
                                ul.childNodes.forEach((i) => {
                                    i.classList.remove("active")
                                })
                            })
                            li.classList.add("active")
                            btnContent.textContent = li.textContent
                            btn.classList.remove("active")
                            document.querySelector(`.${classStr} > .dropdown-menu`).classList.remove("active")
                            groupOption.forEach((e) => {
                                let optionItem = [...e.children]
                                optionItem.forEach((item) => {
                                    if (item.textContent === btnContent.textContent)
                                        item.setAttribute("selected", true)
                                    else item.removeAttribute("selected")
                                })
                            })
                        }
                    })
                })
            })
        }
        function removeAccents(str) {
            return str.normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/đ/g, 'd').replace(/Đ/g, 'D');
        }
        btn.addEventListener("click", () => {
            btn.classList.toggle("active")
            document.querySelector(`.${classStr} > .dropdown-menu`).classList.toggle("active")
        })
        const search = document.querySelector(`.${classStr} > .dropdown-menu > .bs-searchbox > input`)
        let ul = [...dropdownContent.children]
        search.addEventListener("input", (e) => {
            let filter = e.target.value.toLowerCase()
            ul.forEach((item) => {
                item.childNodes.forEach((li) => {
                    if (li.classList.value === "") {
                        if (removeAccents(li.textContent.toLowerCase()).indexOf(removeAccents(filter)) > -1) {
                            li.style.display = ""
                        }
                        else {
                            li.style.display = "none"
                        }
                    }
                })
            })
        })
        window.addEventListener("click", function (e) {
            if (!document.querySelector(`.${classStr}`).contains(e.target)) {
                btn.classList.remove("active")
                document.querySelector(`.${classStr} > .dropdown-menu`).classList.remove("active")
            }
        })
    }
}

customSelect("select", false)