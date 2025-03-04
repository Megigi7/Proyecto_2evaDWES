<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Frutería Vue</title>
    <style>
        body {
            background-color: #f8ffe6;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .fruit-header {
            text-align: center;
            color: #ff6b6b;
            font-size: 24px;
            margin: 20px 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        .fruit-border {
            border: 2px dashed #ff9f43;
            padding: 15px;
            border-radius: 10px;
            margin: 10px 0;
        }
        button {
            background-color: #ff9f43;
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            margin: 5px;
            transition: all 0.3s;
        }
        button:hover {
            background-color: #ff6b6b;
            transform: scale(1.05);
        }
        input {
            border: 2px solid #ff9f43;
            border-radius: 5px;
            padding: 5px;
            margin: 5px;
        }
        .table {
            border: 2px solid #ff9f43;
        }
        .table th {
            background-color: #ff9f43;
            color: white;
        }
        .fruit-total {
            font-size: 20px;
            color: #ff6b6b;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="app" class="container">
        <div class="fruit-border">
            <button v-on:click="incrementar">Incrementar 🍎</button>
            <button v-on:click="resetear">Resetear 🔄</button>
            <button v-on:click="decrementar">Decrementar 🍏</button>
            <p>Contador: {{ contador }} 🔢</p>
        </div>
        
        <div class="fruit-header">
            🥥 🍈 🍏 🍐 🥝 🍋 🍌 🍍 🍑 🥭 🍊 🍉 🍓 🍒 🍇          
        </div>
        
        <div class="fruit-border">
            Fruta: <input type="text" v-model="nuevaFruta" required placeholder="Nombre de la fruta">
            Cantidad: <input type="number" v-model="nuevaCantidad" min=1 required>
            <button v-on:click="insertaFruta">Añadir Fruta 🍓</button>
            <p style="color: red;">{{error}}</p>
        </div>

        <h3 class="fruit-header">🍎 Inventario de Frutas 🍏</h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre 🏷️</th>
                    <th>Cantidad 🔢</th>
                    <th>Acciones ⚡</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(fruta, index) in frutas">
                    <td>{{fruta.nombre}}</td>
                    <td>{{fruta.cantidad}}</td>
                    <td><button v-on:click="borrarFruta(index)">Borrar 🗑️</button></td>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="fruit-total">TOTAL FRUTAS: {{ total }} 🏆</div>
    </div>
</body>
<script>
    app = new Vue ({
        el: '#app',
        data: {
            mensaje: 'Hola amiguitos',
            palabra:'',
            contador: 0,
            error: '',
            nuevaFruta:'',
            nuevaCantidad: 1,
            total:0,
            frutas: [{nombre:'manzanas',cantidad:50},{nombre:'peras',cantidad:50},{nombre:'fresas',cantidad:50},{nombre:'plátanos',cantidad:50}]
        },
        mounted(){
            this.totaliza();
        },
        methods: {
            totaliza(){
                this.total = 0;
                this.frutas.forEach(element => {
                    this.total += element.cantidad;
                });
            },
            insertaFruta(){
                if (this.nuevaFruta == ''){
                    this.error = 'Introduce una fruta'
                    return;
                }else if (this.nuevaCantidad < 1){
                    this.error = 'Introduce una mayor a 1'
                    return;
                }
                this.frutas.push({nombre: this.nuevaFruta, cantidad: parseInt(this.nuevaCantidad)});
                this.totaliza();
            },
            incrementar(){
                this.contador++
            },
            resetear(){
                this.contador = 0
                
            },
            borrarFruta(index){
                this.frutas.splice(index, 1);
                this.totaliza();
            },
            decrementar(){
                this.contador -= 1
            }
        }
    })
</script>
</html>