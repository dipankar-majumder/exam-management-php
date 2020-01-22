<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-lg-6 mx-auto">
    <div class="card card-body bg-light my-5">
      <?php flash('register_success'); ?>
      <h2>Fill Details</h2>
      <p>Please fill out this form to continue</p>
      <?php if (empty($_SESSION['email'])) : ?>
        <div class="alert alert-danger">
          This would not work directly
        </div>
      <?php exit;
      endif; ?>
      <form action="<?php echo URLROOT; ?>/teachers/fillDetails" method="post" novalidate>
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
            <option value="" selected disabled hidden>Select An Option</option>
            <option value="1">Below Secondary</option>
            <option value="2">Secondary</option>
            <option value="3">Higher Secondary</option>
            <option value="4">Graduate</option>
            <option value="5">Hons. Graduate</option>
            <option value="6">Post Graduate</option>
            <option value="7">M. Phil.</option>
            <option value="8">Ph. D.</option>
            <option value="9">Post Doctoral</option>
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
            <option value="1">NET</option>
            <option value="2">SLET</option>
            <option value="3">Certificate</option>
            <option value="4">Diploma</option>
            <option value="5">PG Diploma</option>
          </select>
        </div>
        <div class="form-group">
          <label for="designation">
            Designation
          </label>
          <select name="designation" id="designation" class="form-control" required>
            <option value="" selected disabled hidden>Select An Option</option>
            <option value="1">Principal</option>
            <option value="2">Vice-Principal</option>
            <option value="3">Asst. Prof Stage I</option>
            <option value="4">Asst. Prof Stage II</option>
            <option value="5">Asst. Prof Stage III</option>
            <option value="6">Associate Professor</option>
            <option value="7">Professor</option>
            <option value="8">Librarian</option>
            <option value="9">Librarian Sr. Scale</option>
            <option value="10">Librarian Sr. Grade Scale</option>
            <option value="11">GLI</option>
            <option value="12">GLI Sr. Scale</option>
            <option value="13">GLI Sr. Grade Scale</option>
            <option value="14">Gr-B</option>
            <option value="15">Gr-C</option>
            <option value="16">Gr-D</option>
          </select>
        </div>
        <div class="form-group">
          <label for="department">Department: <sup>*</sup></label>
          <input type="text" name="department" id="department" class="form-control" required>
          <span class="invalid-feedback"></span>
        </div>
        <div class="form-group">
          <label class="radio-inline control-label">
            Gender
          </label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="1">
            <label class="form-check-label" for="gender_male">Male</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="2">
            <label class="form-check-label" for="gender_female">Female</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender_others" value="3">
            <label class="form-check-label" for="gender_others">Others</label>
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
            <option value="1">5400-25200</option>
            <option value="2">4900-16200</option>
            <option value="3">15600-39100</option>
            <option value="4">37400-67000</option>
            <option value="5">7100-37600</option>
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
          <input type="email" name="email" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" disabled>
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
            <input type="text" name="house_number" id="house_number" class="form-control">
            <label for="location">Location/Street Name</label>
            <input type="text" name="location" id="location" class="form-control">
            <label for="village">Town/Village</label>
            <input type="text" name="village" id="village" class="form-control">
            <label for="post_office">Post Office</label>
            <input type="text" name="post_office" id="post_office" class="form-control">
            <label for="police_station">Police Station</label>
            <input type="text" name="police_station" id="police_station" class="form-control">
            <label for="pin_code">Pin Code</label>
            <input type="text" name="pin_code" id="pin_code" class="form-control">
            <label for="district">District</label>
            <input type="text" name="district" id="district" class="form-control">
            <label for="state">State</label>
            <input type="text" name="state" id="state" class="form-control">
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="permanent-equals-present-address">
            <label class="form-check-label" for="permanent-equals-present-address">Whether Permanent Address is same as Present Address</label>
          </div>
          <label for="permanent_address">Permanent Address</label>
          <div class="form-group" id="permanent_address">
            <label for="house_number">Building Name/House No.</label>
            <input type="text" name="house_number" id="house_number" class="form-control">
            <label for="location">Location/Street Name</label>
            <input type="text" name="location" id="location" class="form-control">
            <label for="village">Town/Village</label>
            <input type="text" name="village" id="village" class="form-control">
            <label for="post_office">Post Office</label>
            <input type="text" name="post_office" id="post_office" class="form-control">
            <label for="police_station">Police Station</label>
            <input type="text" name="police_station" id="police_station" class="form-control">
            <label for="pin_code">Pin Code</label>
            <input type="text" name="pin_code" id="pin_code" class="form-control">
            <label for="district">District</label>
            <input type="text" name="district" id="district" class="form-control">
            <label for="state">State</label>
            <input type="text" name="state" id="state" class="form-control">
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