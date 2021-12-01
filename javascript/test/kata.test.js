const { renameMe } = require('../src/kata');

describe("Kata", function () {
  it("change_this_name", function () {
    const result = renameMe();
    expect(result).toBe(true);
  });
});
