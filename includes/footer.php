<footer class="my-5 container">
      <div class="row">
        <div class="col-sm-12">
          <div class="d-flex justify-content-between">
            <h1 class="footer-logo fw-bold">NEWS ROOM</h1>
            <!-- <img src="images/logo.svg"  alt="" /> -->

            <div class="d-flex justify-content-end footer-social align-items-center">
              <h5 class="fw-bold me-3 d-none d-lg-flex">Follow on</h5>
              <ul class="d-flex list-unstyled social">
                <?php
                  $sql="SELECT link_icon, link_url FROM mysocial_link WHERE is_active='1'";
                  $result=$db_config->query($sql);
                  while ($data=$result->fetch_object()) {
                ?>
                <li>
                  <a href="<?php echo $data->link_url; ?>" target="_blank" class="me-2">
                    <i class="fab <?php echo $data->link_icon; ?>"></i>
                  </a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div
            class="d-lg-flex justify-content-between align-items-center border-top"
          >
            <ul class="d-lg-flex footer-horizontal-menu list-unstyled">
              <!-- modal btn -->
              <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Terms of Use.</a></li>
              <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">AdChoices.</a></li>
              <li><a href="contact.php">Contact.</a></li>
              <li><a href="#">Sitemap.</a></li>
            </ul>

            <!--Terms of Use Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Terms of Use</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      We welcome readers and visitors to our “Terms of Use’ of NEWSROOM and its associated websites, its contents, services and applications. Individuals may access the content in several ways using multiple channels including but not limited to www, digital, social platforms, SMS and RSS feeds using multiple devices including but not limited to computers, mobile phones and PDAs. By using our content and services, that is , by reading or using any content, picture or information whatsoever, the reader/visitor accepts our “Terms of Use” including NEWSROOM’s Privacy Policy. If anyone has any objection or reservation to any clause in this “Terms of Use” or the Privacy Policy, she or he may raise the issue with NEWSROOM by sending an email at info@newsroom.com. However, NEWSROOM reserves all right to reject or accept any such objection or reservation. All users of NEWSROOM are required to abide by this “Terms of Use”. Failure to comply with the terms may lead to, among others, suspension of account or prohibition from access to the website. By entering the website of NEWSROOM or using applications of NEWSROOM, readers/visitors are deemed to have received services from NEWSROOM. These services include text, audio, video, images, software etc.
                      Intellectual Property Rights

                      NEWSROOM’s content, logos, copyright, trademarks, patents, images, text, graphics, logos, domain names, audio, video and other related intellectual property rights or other features of NEWSROOM brand and name belong to NEWSROOM or to its licensors. Users cannot claim any rights in and/or our licensor’s intellectual property whether for commercial or non-commercial use. Users are also prevented from making any derivative work from the content of NEWSROOM. Infringement of copyright or any other intellectual property of NEWSROOM may be sent at info@newsroom.com.
                      Your use of our services

                      Site readers/visitors are required to use NEWSROOM services only for lawful means and for read-only purposes. The audio and visual elements of the website or application can only be listened to and viewed and nothing beyond. NEWSROOM encourages its readers to share its content(s) in their social media profile, groups and related communities. However, the contents of our services must not be shared with anyone or with any other digital platforms with any modification or alteration. Readers/Visitors are prohibited from hacking the website, or trying to get around our content security setup.

                      The users must use the services only for non-commercial purposes, regardless of whether the person or entity is a commercial entity or not. We grant our users only a license to access and use our services and intellectual property rights subject to the following usage restrictions: users may use available services for personal, private and non-commercial purposes only, the users must not exploit, sell or use any content appearing on our services for any kind of commercial purposes (this does not apply to any user content posted by an individual and in which a visitor/user retains ownership rights), the users must not use provocative or offensive language, pictures or comments targeting the contents of NEWSROOM.
                      Taking down contents

                      NEWSROOM can take down contents at any time at its sole discretion from its website or application. Readers/Visitors cannot refuse to remove content, games or apps from their respective devices if asked by NEWSROOM. This might happen when NEWSROOM or its services are taken down.
                      Unauthorized and prohibited activities

                      The user is specifically required not to associate NEWSROOM with any political party, racism, sexism or otherwise damage its reputation. The user is also prohibited from defaming NEWSROOM or defaming any other person or entity, or commenting on any court proceedings that may amount to a contempt of court. Harassing, bullying or upsetting the people or any other user is strongly prohibited. The user must not post or upload any image or comment which is offensive or obscure or immoral. Personal attack by way of comment or image is likewise prohibited..
                      Protection of Users Device

                      Readers/Visitors are required to take their own precautions and protections in this respect as NEWSROOM does not accept any responsibility for any attacks by virus or malware or any other contamination or by anything which has destructive properties. NEWSROOM strictly does not hold any responsibility for infection of virus or contamination of your machine or device through your access to any third-party contents. Third party contents may include, but is not limited to Google ads. Any content which is not generated by NEWSROOM itself is a third-party content, regardless of whether the content appears on the website of NEWSROOM or not.
                      Prohibition on sharing mark, contents, images, etc.

                      NEWSROOM prohibits the users from sharing marks, contents or images for whatever purpose, be it commercial or not. When sharing of contents, images or marks are permitted or authorized, then such sharing must be done by attributing the credit and name to NEWSROOM in such manner that the attribution is clearly visible when the image or content is generated by NEWSROOM. All users are prohibited from taking credit from the contents or images shared, published or generated by NEWSROOM.
                      Redirecting to other Websites

                      NEWSROOM will not accept any kind of liability if the user is redirected to any other website including unwanted websites from the NEWSROOM.
                      Third Party Contents

                      NEWSROOM does not bear any responsibility or liability whatsoever for any third-party contents. Third party contents include such contents which are not generated or produced by NEWSROOM. It includes contents, images and texts which are uploaded or displayed by NEWSROOM but which are created or generated or produced by someone or entity other than NEWSROOM.
                      Privacy Policy

                      The entire Privacy Policy of NEWSROOM is an integral part of the “Terms of Use”. All clauses in the Privacy Policy are hereby incorporated by reference, except for the clauses which are similar or have the same meaning.
                      Advertisement

                      The advertisements included in the NEWSROOM website and mobile apps, are by third-party companies, which may collect information about users for which NEWSROOM shall bear no responsibility that may arise as a result of collecting and/or sharing the information with any other party. NEWSROOM shall not accept any liability that may arise as a result of any content of any advertisement that may appear on the NEWSROOM website.
                      Modification of Terms of Use

                      NEWSROOM reserves the right to amend, modify, alter, or omit any terms in the “Terms of Use” at any time but the changed policy shall be immediately uploaded or updated in the website. By continuing to use our services after any changes are made, you accept those changes and will be bound by them. We encourage readers/visitors to periodically check back and review this policy to always know what information we collect, how we use it, and with whom we share it.
                      Use of Cookies

                      NEWSROOM does not collect any user data based on cookies, nor does it store any sort of user information that may be personal to the user. If a third party associated with the NEWSROOM website collects user cookies upon your visit to the NEWSROOM website, NEWSROOM does not control the use of these cookies. Therefore, visitors/users should check the relevant third-party websites.

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

              <!--ad choice Modal -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Advertisementag</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    As per the latest National Media Survey (NMS 2018 of Kantar MRB), 6.6 million people read the print edition of NEWSROOM every day, and it is the highest readership number among all Bangladeshi newspapers. NEWSROOM does not only have the widest reader base as a whole, but it also reaches to the most erudite readers of Bangladesh belonging to the upper SEC (Socio Economic Class). NEWSROOM is way ahead of any other newspaper in reaching key target groups of readers.

                    newsroom.com is the “Number 1” Bangladeshi as well as Bengali Language website in the world based on traffic and pageviews. Around 12 million users access this portal every month from over 200 different countries and territories. They generate around 280 million pageviews per month. Through all digital platforms, Bengali and English portals and mobile apps, NEWSROOM Online reaches over 1 million people every day at home and abroad.

                    Beyond the border of Bangladesh NEWSROOM Weekly North America Edition is printed in New York and distributed to the expatriate Bangladeshis residing across the USA and Canada.
                    Print Edition

                    Contact:
                    NEWSROOM, Advertising Sales
                    19, Motijhil
                    Dhaka 1215, Bangladesh
                    Phone: +880-55012216
                    ad@newsroom.com
                    Online Edition (newsroom.com)

                    Contact:
                    adsales@newsroom.com 
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <p class="font-weight-medium">
              © 2021 <a href="index.php" class="text-dark text-decoration-none">@ NEWSROOM</a>, Inc.All Rights Reserved.
            </p>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
</body>
</html>