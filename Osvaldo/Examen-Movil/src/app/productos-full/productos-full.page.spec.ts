import { ComponentFixture, TestBed } from '@angular/core/testing';
import { ProductosFullPage } from './productos-full.page';

describe('ProductosFullPage', () => {
  let component: ProductosFullPage;
  let fixture: ComponentFixture<ProductosFullPage>;

  beforeEach(() => {
    fixture = TestBed.createComponent(ProductosFullPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
