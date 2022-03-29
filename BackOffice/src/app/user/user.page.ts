import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';


@Component({
  selector: 'app-user',
  templateUrl: './user.page.html',
  styleUrls: ['./user.page.scss'],
})
export class UserPage implements OnInit {
  data:any;

  constructor(
    private activatedRoute:ActivatedRoute
  ) {
    // get the data from the URL

    this.activatedRoute.paramMap.subscribe(

      (data) => {

        console.log(data)

      }

    );
    this.data = this.activatedRoute.snapshot.paramMap.get('xyz');
   }

  ngOnInit() {
  }

}
