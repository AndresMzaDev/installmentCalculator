[![Captura-de-pantalla-2024-02-26-a-la-s-08-19-09.png](https://i.postimg.cc/BvQsQGMK/Captura-de-pantalla-2024-02-26-a-la-s-08-19-09.png)](https://postimg.cc/HrKFBFGY)


# Calculadora Prestamo


Esta es una app sencilla, para calcular la cuota mensual en prestamos, solo ingresas los datos del prestamo y calculas, asi de facil 





## Tech Stack

**Client:** <a href="https://vuejs.org/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/vuejs/vuejs-original-wordmark.svg" alt="vuejs" width="40" height="40"/> </a> , Tailwind 



## Authors

- [@ndresMeza](https://www.linkedin.com/in/andres-meza-dev/)


## FAQ

#### Will Users be saved in the database?

These are not stored in a class but a user type structure

#### What type of architecture is it made with?

It was about implementing the MVVM architecture, for the management of screens and logic.


## Documentation

[Documentation](https://linktodocumentation)


## Usage/Examples
A data store was simulated, where there is user validation and adding a new user.


```swift
class UserStore: ObservableObject {
    @Published var users: [userStruct] = [userStruct(name: "Andres Neptaly Meza", age: 30, numberPhone: 99999999999, gender: "M", email: "admin@root.com", password: "Admin123.")]
    
    func addUser(name: String, age: Int, numberPhone: Int, gender: String, email: String, password: String ){
        let newUser =  userStruct(name: name, age: age, numberPhone: numberPhone, gender: gender, email: email, password: password)
        users.append(newUser)

        print("usuarios \(getUser())")
    }
    
    func validateEmail(_ email: String) -> Bool {
        
        if let userFound = users.first(where: { $0.email == email }) {
            print("Persona encontrada: \(userFound)")
            return true
        } else {
            print("No se encontró ninguna persona con edad igual a 30")
            return false
          
        }
    }
    
    func getUser() -> [userStruct] {
        return users
    }
}
```

