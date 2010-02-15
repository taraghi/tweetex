<h1>Tweets List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>User</th>
      <th>Tweet source</th>
      <th>Geo</th>
      <th>Contributors</th>
      <th>Contributors enabled</th>
      <th>In reply to user</th>
      <th>In reply to status</th>
      <th>In reply to screen name</th>
      <th>Tweet created at</th>
      <th>Truncated</th>
      <th>Tweet twitter</th>
      <th>Source</th>
      <th>Text</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tweets as $tweet): ?>
    <tr>
      <td><a href="<?php echo url_for('tweet/show?id='.$tweet->getId()) ?>"><?php echo $tweet->getId() ?></a></td>
      <td><?php echo $tweet->getUserId() ?></td>
      <td><?php echo $tweet->getTweetSourceId() ?></td>
      <td><?php echo $tweet->getGeoId() ?></td>
      <td><?php echo $tweet->getContributors() ?></td>
      <td><?php echo $tweet->getContributorsEnabled() ?></td>
      <td><?php echo $tweet->getInReplyToUserId() ?></td>
      <td><?php echo $tweet->getInReplyToStatusId() ?></td>
      <td><?php echo $tweet->getInReplyToScreenName() ?></td>
      <td><?php echo $tweet->getTweetCreatedAt() ?></td>
      <td><?php echo $tweet->getTruncated() ?></td>
      <td><?php echo $tweet->getTweetTwitterId() ?></td>
      <td><?php echo $tweet->getSource() ?></td>
      <td><?php echo $tweet->getText() ?></td>
      <td><?php echo $tweet->getCreatedAt() ?></td>
      <td><?php echo $tweet->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tweet/new') ?>">New</a>
