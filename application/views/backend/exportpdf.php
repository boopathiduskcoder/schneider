<table style="height: 90px; width: 100%; border-collapse: collapse; border-style: solid;" border="1">
  <tbody>
    <tr style="height: 18px;">
      <td style="width: 50%; height: 50px;"><img src="<?php echo base_url(); ?>assets/images/index_logo.png " ></td>
      <td style="width: 75%; height: 50px;"><b><center>&nbsp;<h3>SCHNEIDER PROTOTYPING INDIA PVT.LTD. </h3>&nbsp;<br><hr>&nbsp; 
	  <h1>BREAKDOWN SLIP</h1>&nbsp;</center> </b>
	</td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 50%; height: 50px;">&nbsp;<h4> Department: <i><?php echo $breakdown->dep_name; ?></i>&nbsp; <hr>Location: <i><?php echo $breakdown->location_name; ?></i> </h4> &nbsp;</td>
      <td style="width: 25%; height: 25px;"><h4>Reported Date & Time: <i><?php echo date('d F Y , h:i:s', strtotime( $breakdown->date_and_time)); ?></i></h4></td>
    </tr>
    <tr style="height: 18px;">
      <td style="width: 50%; height: 50px;"><h4>Type of Breakdown: <i><?php echo $breakdown->breakdown_name; ?></i></h4></td>
      <td style="width: 50%; height: 50px;"><h4>Completed Date: <i><?php echo  date('d F Y', strtotime($breakdown->completeddate)); ?></i></h4></td>
    </tr>
    
  </tbody>
</table>
<table style="border-collapse: collapse; width: 100%;" border="1">
  <tbody>
    <tr>
      <td style="width: 50%; height: 50px;"><h5>Breakdown Details:</h5></td>
    </tr>
  </tbody>
</table>
<table style="border-collapse: collapse; width: 100%;" border="1">
  <tbody>
    <tr>
      <td style="width: 50%; height: 50px;"><h5>Action taken Details:</h5></td>
    </tr>
  </tbody>
</table>
<table style="border-collapse: collapse; width: 100%;" border="1">
  <tbody>
    <tr>
      <td style="width: 50%; height: 50px;"><h5>If any Pending:</h5></td>
    </tr>
  </tbody>
</table>