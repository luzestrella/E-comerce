import { Component, OnInit } from '@angular/core';
import { Cart } from 'src/app/model/cart';
import { Product } from 'src/app/model/product/product';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {

  constructor(private cart: Cart) {

  }

  ngOnInit() {
  }
  get productos() {
    return this.cart.mostar();
  }
  changePrice(producto:Product, numero:number){
    this.cart.cambiarPrecio(producto,+numero);
  }
  eliminarProducto(product:Product){
    this.cart.Eliminar(product);
  }
}
