import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ProductComponent } from './product/product.component';
import { ProductDatasourceService } from './product-datasource.service';
import { ProductRepositoryService } from './product-repository.service';

@NgModule({
  declarations: [ProductComponent],
  imports: [
    CommonModule
  ],
  providers: [
    ProductDatasourceService,
    ProductRepositoryService
  ]
})
export class ModelModule { }
