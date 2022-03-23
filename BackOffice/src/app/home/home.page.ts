import { Component } from '@angular/core';
import { getStorage } from 'src/services/storage';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  uuid;

  constructor() {

    console.log("--" + getStorage('uuid'));
    this.getDataStorage();

  }


  async getDataStorage(){
    this.uuid = await getStorage('uuid');
    console.log("---------->" + this.uuid);
}


}
