import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';
import { ProductRepositoryService } from 'src/app/model/product-repository.service';
import { Product } from 'src/app/model/product/product';
import { StoreComponent } from '../store.component';
import { Cart } from 'src/app/model/cart';

@Component({
  selector: 'app-checkout',
  templateUrl: './checkout.component.html',
  styleUrls: ['./checkout.component.css']
})
export class CheckoutComponent implements OnInit {
  private route: string;
  constructor(private nav: ActivatedRoute, private products: ProductRepositoryService,private cart: Cart) {
    this.nav.params.subscribe((param: Params) => {
      this.route = param["productCode"];
      console.log(this.route);
    })
  }
  get product(): Product[] {
    return this.products.getProduct(this.route);
  }
  agregar(product:Product){
    this.cart.addLine(product);
 }
  ngOnInit() {
  }

}
