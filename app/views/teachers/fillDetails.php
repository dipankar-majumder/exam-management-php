<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-lg-6 mx-auto">
    <div class="card card-body bg-light my-5">
      <?php flash('register_success'); ?>
      <h2>Fill Details</h2>
      <p>Please fill out this form to continue</p>
      <?php if (empty($_SESSION['email'])) : ?>
        <div class="alert alert-danger">
          This would not work directly❌😆
        </div>
      <?php exit;
      endif; ?>
      <form action="<?php echo URLROOT; ?>/teachers/fillDetails" method="post">
        <div class="form-group">
          <label for="name">Name: <sup>*</sup></label>
          <input type="text" name="name" id="name" class="form-control" required>
          <span class="invalid-feedback"></span>
        </div>
        <div class="form-group">
          <label for="date_of_birth">Date of Birth: <sup>*</sup></label>
          <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
          <span class="invalid-feedback"></span>
        </div>
        <div class="form-group">
          <label for="highest_educational_qualification">Highest Educational Qualification</label>
          <select name="highest_educational_qualification" id="highest_educational_qualification" class="form-control" required>
            <option value="" selected>Select An Option</option>
            <option>Below Secondary</option>
            <option>Secondary</option>
            <option>Higher Secondary</option>
            <option>Graduate</option>
            <option>Hons. Graduate</option>
            <option>Post Graduate</option>
            <option>M. Phil.</option>
            <option>Ph. D.</option>
            <option>Post Doctoral</option>
          </select>
        </div>
        <div class="form-group">
          <label class="radio control-label">
            Whether Any Additional/Extra/Professional Qualification
          </label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="additional_qualification_check" id="additional_qualification_yes" value="1">
            <label class="form-check-label" for="additional_qualification_yes">Yes</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="additional_qualification_check" id="additional_qualification_no" value="0">
            <label class="form-check-label" for="additional_qualification_no">No</label>
          </div>
        </div>
        <div class="form-group" id="additional_qualification_form">
          <label for="additional_qualification">
            Additional/Extra/Professional Qualification
          </label>
          <select name="additional_qualification" id="additional_qualification" class="form-control">
            <option value="" selected>Select An Option</option>
            <option>NET</option>
            <option>SLET</option>
            <option>Certificate</option>
            <option>Diploma</option>
            <option>PG Diploma</option>
          </select>
        </div>
        <div class="form-group">
          <label for="designation">
            Designation
          </label>
          <select name="designation" id="designation" class="form-control" required>
            <option value="" selected disabled hidden>Select An Option</option>
            <option>Principal</option>
            <option>Vice-Principal</option>
            <option>Asst. Prof Stage I</option>
            <option>Asst. Prof Stage II</option>
            <option>Asst. Prof Stage III</option>
            <option>Associate Professor</option>
            <option>Professor</option>
            <option>Librarian</option>
            <option>Librarian Sr. Scale</option>
            <option>Librarian Sr. Grade Scale</option>
            <option>GLI</option>
            <option>GLI Sr. Scale</option>
            <option>GLI Sr. Grade Scale</option>
            <option>Gr-B</option>
            <option>Gr-C</option>
            <option>Gr-D</option>
          </select>
        </div>
        <div class="form-group">
          <label for="department">Department: <sup>*</sup></label>
          <input type="text" name="department" id="department" class="form-control" required>
          <span class="invalid-feedback"></span>
        </div>
        <div class="form-group">
          <label class="radio control-label">
            Gender
          </label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male">
            <label class="form-check-label" for="gender_male">Male</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female">
            <label class="form-check-label" for="gender_female">Female</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_others" value="Others">
            <label class="form-check-label" for="gender_others">Others</label>
          </div>
        </div>
        <div class="form-group">
          <label class="radio control-label">
            Category
          </label>
          <div class="form-check">
            <input type="radio" name="category" id="category_unreserved" class="form-check-input" value="Unreserved">
            <label for="category_unreserved" class="form-check-label">Unreserved</label>
          </div>
          <div class="form-check">
            <input type="radio" name="category" id="category_sc" class="form-check-input" value="SC">
            <label for="category_sc" class="form-check-label">SC</label>
          </div>
          <div class="form-check">
            <input type="radio" name="category" id="category_st" class="form-check-input" value="ST">
            <label for="category_st" class="form-check-label">ST</label>
          </div>
          <div class="form-check">
            <input type="radio" name="category" id="category_obc_a" class="form-check-input" value="OBC A">
            <label for="category_obc_a" class="form-check-label">OBC A</label>
          </div>
          <div class="form-check">
            <input type="radio" name="category" id="category_obc_b" class="form-check-input" value="OBC B">
            <label for="category_obc_b" class="form-check-label">OBC B</label>
          </div>
        </div>
        <div class="form-group">
          <label class="radio-inline control-label">
            Whether belongs to PH category
          </label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="physically_handicapped" id="physically_handicapped_yes" value="1">
            <label class="form-check-label" for="physically_handicapped_yes">Yes</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="physically_handicapped" id="physically_handicapped_no" value="0">
            <label class="form-check-label" for="physically_handicapped_no">No</label>
          </div>
        </div>
        <div class="form-group">
          <label class="radio-inline control-label">
            Whether Ex-Service Man
          </label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="ex_service_man" id="ex_service_man_yes" value="1">
            <label class="form-check-label" for="ex_service_man_yes">Yes</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="ex_service_man" id="ex_service_man_no" value="0">
            <label class="form-check-label" for="ex_service_man_no">No</label>
          </div>
        </div>
        <div class="form-group">
          <label class="radio-inline control-label">
            Whether belongs to Exempted Category
          </label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exempted_category" id="exempted_category_yes" value="1">
            <label class="form-check-label" for="exempted_category_yes">Yes</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exempted_category" id="exempted_category_no" value="0">
            <label class="form-check-label" for="exempted_category_no">No</label>
          </div>
        </div>
        <div class="form-group">
          <label for="date_of_joining_in_service">Date of Joining in Service</label>
          <input type="date" name="date_of_joining_in_service" id="date_of_joining_in_service" class="form-control" required>
          <span class="invalid-feedback"></span>
        </div>
        <div class="form-group">
          <label for="date_of_joining_in_present_college">Date of Joining in Present College</label>
          <input type="date" name="date_of_joining_in_present_college" id="date_of_joining_in_present_college" class="form-control" required>
          <span class="invalid-feedback"></span>
        </div>
        <div class="form-group">
          <label for="pay_band">
            Pay Band
          </label>
          <select name="pay_band" id="pay_band" class="form-control">
            <option value="" selected disabled hidden>Select An Option</option>
            <option>5400-25200</option>
            <option>4900-16200</option>
            <option>15600-39100</option>
            <option>37400-67000</option>
            <option>7100-37600</option>
          </select>
        </div>
        <div class="form-group">
          <label for="band_pay">Band Pay</label>
          <input type="number" name="band_pay" id="band_pay" class="form-control" required>
          <span class="invalid-feedback"><?php echo $data['band_pay_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="grade_pay">Academic Grade Pay/Grade Pay</label>
          <input type="number" name="grade_pay" id="grade_pay" class="form-control" required>
          <span class="invalid-feedback"><?php echo $data['grade_pay_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="pan_number">PAN Number</label>
          <input type="number" name="pan_number" id="pan_number" class="form-control" required>
          <span class="invalid-feedback"><?php echo $data['pan_number_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="mobile_number">Mobile Number</label>
          <input type="tel" name="mobile_number" id="mobile_number" class="form-control" required>
          <span class="invalid-feedback"><?php echo $data['mobile_number_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="email">Email: <sup>*</sup></label>
          <input type="email" name="email" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" readonly>
          <span class="invalid-feedback"></span>
        </div>
        <div class="form-group">
          <label for="date_of_superannuation">Date of Superannuation</label>
          <input type="date" name="date_of_superannuation" id="date_of_superannuation" class="form-control" required>
          <span class="invalid-feedback"><?php echo $data['date_of_superannuation_err']; ?></span>
        </div>
        <div class="form-group">
          <label for="present_address">Present Address</label>
          <div class="form-group" id="present_address">
            <label for="house_number">Building Name/House No.</label>
            <input type="text" name="present_address_house_number" id="house_number" class="form-control">
            <label for="location">Location/Street Name</label>
            <input type="text" name="present_address_location" id="location" class="form-control">
            <label for="village">Town/Village</label>
            <input type="text" name="present_address_village" id="village" class="form-control">
            <label for="post_office">Post Office</label>
            <input type="text" name="present_address_post_office" id="post_office" class="form-control">
            <label for="police_station">Police Station</label>
            <input type="text" name="present_address_police_station" id="police_station" class="form-control">
            <label for="pin_code">Pin Code</label>
            <input type="text" name="present_address_pin_code" id="pin_code" class="form-control">
            <label for="district">District</label>
            <input type="text" name="present_address_district" id="district" class="form-control">
            <label for="state">State</label>
            <input type="text" name="present_address_state" id="state" class="form-control">
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="permanent-equals-present-address">
            <label class="form-check-label" for="permanent-equals-present-address">Whether Permanent Address is same as Present Address</label>
          </div>
          <label for="permanent_address">Permanent Address</label>
          <div class="form-group" id="permanent_address">
            <label for="house_number">Building Name/House No.</label>
            <input type="text" name="permanent_address_house_number" id="house_number" class="form-control">
            <label for="location">Location/Street Name</label>
            <input type="text" name="permanent_address_location" id="location" class="form-control">
            <label for="village">Town/Village</label>
            <input type="text" name="permanent_address_village" id="village" class="form-control">
            <label for="post_office">Post Office</label>
            <input type="text" name="permanent_address_post_office" id="post_office" class="form-control">
            <label for="police_station">Police Station</label>
            <input type="text" name="permanent_address_police_station" id="police_station" class="form-control">
            <label for="pin_code">Pin Code</label>
            <input type="text" name="permanent_address_pin_code" id="pin_code" class="form-control">
            <label for="district">District</label>
            <input type="text" name="permanent_address_district" id="district" class="form-control">
            <label for="state">State</label>
            <input type="text" name="permanent_address_state" id="state" class="form-control">
          </div>
        </div>
        <!-- Buttons -->
        <div class="row">
          <div class="col">
            <input type="submit" value="Continue" class="btn btn-success btn-block">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>